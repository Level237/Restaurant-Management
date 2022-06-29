<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use Carbon\Carbon;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use App\Enums\TableStatus;
use App\Models\Table;
class ReservationController extends Controller
{
    public function stepOne(Request $request){
        $reservation=$request->session()->get('reservation');
        $min_date=Carbon::today();
        $max_date=Carbon::now()->addWeek();
        return view('reservations.step-one',compact('reservation','min_date','max_date'));

    }

    public function storeStepOne(Request $request){

        $validated=$request->validate([
            'first_name'=>['required'],
            'last_name'=>['required'],
            'email'=>['required'],
            'phone_number'=>['required'],
            'res_date'=>['required','date',new DateBetween,new TimeBetween],
            'guest_number'=>['required'],
        ]);


        if(empty($request->session()->get('reservation'))){
            $reservation=new Reservation();
            $reservation->fill($validated);
            $request->session()->put('reservation',$reservation);
        }
        else{
            $reservation=$request->session()->get('reservation');
            $reservation->fill($validated);
            $request->session()->put('reservation',$reservation);
        }
        return to_route('reservation.stepTwo');
    }

    public function stepTwo(Request $request){
        $reservation=$request->session()->get('reservation');
        $res_table_ids=Reservation::orderBy('res_date')->get()->filter(function($value) use($reservation){
            return $value->res_date->format('Y-m-d') == $reservation->res_date->format('Y-m-d');
        })->pluck('table_id');
        $tables=Table::where('status',TableStatus::Avaliable)
                ->where('guest_number','>=',$reservation->guest_number)
                ->whereNotIn('id',$res_table_ids)->get();
        return view('reservations.step-two',compact('reservation','tables'));

    }


}

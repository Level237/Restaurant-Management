<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservations;
use Carbon\Carbon;

class ReservationController extends Controller
{
    public function stepOne(Request $request){
        $reservations=$request->session()->get('reservation');
        $min_date=Carbon::today;
        $max_date=Carbon::now()->addWeek();
        return view('reservations.step-one',compact('reservations','min_date','max_date'));

    }
}

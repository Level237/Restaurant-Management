<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Table;
use App\Http\Requests\ReservationRequest;
use App\Enums\TableStatus;
use Carbon\Carbon;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables=Table::all();
        $reservations=Reservation::all();
        return view('admin.reservations.index',compact('reservations','tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tables=Table::where('status',TableStatus::Avaliable)->get();
        return view('admin.reservations.create',compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReservationRequest $request)
    {
        $table=Table::findOrFail($request->table_id);

        if($request->guest_number > $table->guest_number){

            return back()->with('warning','Please choose the table base on guests');
        }
        $request_date=Carbon::parse($request->res_date);
        foreach($table->Reservations as $res){
            if($res->res_date->format('Y-m-d')==$request_date->format('Y-m-d')){
                return back()->with('warning',' Please This table is reserved for this date');
            }
        }
        Reservation::create($request->validated());
        return to_route('admin.reservations.index')->with('success','Reservation created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        $tables=Table::all();
        return view('admin.reservations.edit',compact('reservation','tables'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReservationRequest $request, Reservation $reservation)
    {
        $table=Table::findOrFail($request->table_id);

        if($request->guest_number > $table->guest_number){

            return back()->with('warning','Please choose the table base on guests');
        }
        $request_date=Carbon::parse($request->res_date);
        $reservations=$table->Reservations()->where('id','!=',$reservation->id)-get();
        foreach($reservations as $res){
            if($res->res_date->format('Y-m-d')==$request_date->format('Y-m-d')){
                return back()->with('warning',' Please This table is reserved for this date');
            }
        }
        $reservation->update($request->validated());

        return to_route('admin.reservations.index')->with('success','Table updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return to_route('admin.reservations.index')->with('danger','Table deleted Successfully');
    }
}

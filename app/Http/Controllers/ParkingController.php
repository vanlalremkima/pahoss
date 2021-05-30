<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parking;
class ParkingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parkings=Parking::all();
        return view('parking.index',compact('parkings'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parking.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  dd($request->address);
        $request->validate([
            'address' => 'required',
            'location' => 'required',
            'available_space' => 'required',
            'available_time' => 'required'
        ]);

        Parking::create($request->all());

        return redirect()->route('parkings.index');
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
    public function edit($id)
    {
        // dd($id);
        $parking=Parking::find($id);
        return view('parking.edit',compact('parking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'address' => 'required',
            'location' => 'required',
            'available_space' => 'required',
            'available_time' => 'required'
        ]);
        $parking=Parking::find($id);
        $parking->update($request->all());

        return redirect()->route('parkings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

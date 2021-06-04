<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Parking;
use App\Models\User;

use Illuminate\Support\Facades\DB;
class BookingController extends Controller
{

    public function dashboard()
    {
        $users=User::where('role','user')->get();


        $user_id=Auth::user()->id;
        // dd($user_id);
        $user=User::find($user_id);
        
        $role = Auth::user()->role; 
        switch ($role) {
            case 'administrator':
                return view('dashboard',compact('users'));
            break;
            case 'user':
                return view('dashboard',compact('user'));
            break; 
        }
    }

    public function booking($id)
    {
        
        $parking=Parking::find($id);
        $space=((int)$parking->available_space)-1;
        
        $parking->available_space=$space;
        $parking->update();


        $p_id=$parking->id;
        // get user id
        $u_id = Auth::id(); 
        // dd($u_id);
        

        $str=rand();
        $booking_token = md5($str);
        
        $booking=new Booking();

        $booking->user_id=$u_id;
        $booking->parking_id=$p_id;
        $booking->token=$booking_token;

        $booking->save();

        // generate user details
        $user=User::find($u_id);
        $user_tokken=$booking_token;
        // $find_user=Booking::where('user_id',$u_id)->get();
        return view('booking.generate',compact('parking','user','user_tokken'));

    }

    public function view($id)
    {
        
        $parking=Parking::findOrFail($id);

        $u_id = Auth::id(); 
        
        $results=Booking::where('user_id',$u_id)->where('parking_id',$parking->id)->get();
        // dd($result);
        
        return view('booking.index',compact('results','parking'));
    }

    public function cancel($id)
    {
        $booking=Booking::findOrFail($id);

        $booking->delete();
        $oneParking=Parking::findOrFail($booking->parking_id);
        $oneParking->available_space=$oneParking->available_space+1;
        $oneParking->update();
        // dd($oneParking->available_space);
        $parkings=Parking::all();
        return view('parking.index',compact('parkings'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function booking_list()
     {
        // $bookings=Booking::where('status','booked')->get();

        $bookings = DB::table('bookings')
            ->join('parkings', 'bookings.parking_id', '=', 'parkings.id')
            ->join('users', 'bookings.user_id', '=', 'users.id')
            ->select('bookings.*', 'parkings.*', 'users.*')
            ->where('status','booked')
            ->get();

        //  dd($bookings);
        return view('booking.list',compact('bookings'));
     }


    public function complete($id)
    {
        // dd($id);
        $booking=Booking::where('token',$id)->get();
        // dd($booking[0]->id);
        $book=Booking::find($booking[0]->id);
        $book->status="completed";
        
        $book->save();


        $parking=Parking::find($book->parking_id);
        // dd($parking->id);
        $parking->available_space++;
        $parking->save();

        
        $bookings = DB::table('bookings')
            ->join('parkings', 'bookings.parking_id', '=', 'parkings.id')
            ->join('users', 'bookings.user_id', '=', 'users.id')
            ->select('bookings.*', 'parkings.*', 'users.*')
            ->where('status','booked')
            ->get();

        // dd($bookings);
        return view('booking.list',compact('bookings'));

    }

    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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

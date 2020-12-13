<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\StoreAdRequest;
use App\Models\Category;
use App\Models\Train;
use App\Models\Schedule;
use App\Models\Booking;
use App\Models\City;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\DataTables\TailorDataTable;
use App\DataTables\CustomerDataTable;
use Illuminate\Support\Facades\Redirect;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function bookingDetail(TailorDataTable $dataTable)
    {
        return $dataTable->render('user.tailor');
    }
    public function scheduling()
    {
        $train= Train::all();
        $city= City::all();
        return view('train.index',compact('train','city'));
    }
    public function bookingCreate(Request $request)
    {
        // dd($request);
        $input= $request->all();
        $input['customer_id']= Auth::user()->id;
        Booking::create($input);
        return redirect('/booking-detail');


    }
    public function scheduleCreate(Request $request)
    {
        // dd($request);
        if($request['city_id_1'])
        {
            $row_1= new Schedule;
            $row_1->train_id= $request['train_id'];
            $row_1->city_id= 1;
            $row_1->arrival= $request['arrival_1'];
            $row_1->departure= $request['departure_2'];
            $row_1->save();                
        }
        if($request['city_id_2'])
        {
            $row_1= new Schedule;
            $row_1->train_id= $request['train_id'];
            $row_1->city_id= 2;
            $row_1->arrival= $request['arrival_2'];
            $row_1->departure= $request['departure_2'];
            $row_1->save();                
        }
        if($request['city_id_3'])
        {
            $row_1= new Schedule;
            $row_1->train_id= $request['train_id'];
            $row_1->city_id= 3;
            $row_1->arrival= $request['arrival_3'];
            $row_1->departure= $request['departure_3'];
            $row_1->save();                
        }
        if($request['city_id_4'])
        {
            $row_1= new Schedule;
            $row_1->train_id= $request['train_id'];
            $row_1->city_id= 4;
            $row_1->arrival= $request['arrival_4'];
            $row_1->departure= $request['departure_4'];
            $row_1->save();                
        }
        return redirect('/all-schedules');

    }
    public function booking()
    {
        $train= Train::all();
        $city= City::all();

    return view('train.booking',compact('train','city'));
    }
    public function tailorDataTable(TailorDataTable $dataTable)
    {
        return $dataTable->render('user.tailor');
    }
    public function customerDataTable(CustomerDataTable $dataTable)
    {
        return $dataTable->render('user.customer');
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

    /**deactivate
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

    }
    public function statusUpdated(Request $request)
    {

        $user=User::where('id',$request->id)->update(['status'=>$request->status]);
        // \Log::info($user);
        // $user

        return Redirect::back();

        // User::find($request->id)->update(['status'=>$request->status]);
        // return Redirect::back();

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
    public function rating()
    {
        $tailors= User::where('type','tailor')->get();
        return view('user.rating',compact('tailors'));
    }

   public function addRating(Request $request)
    {
        // dd($request);
        $input=$request->all();
        Rating::create($input);
        return redirect('reviews');
    }

    public function getRatingDetail($id){
        $users = Rating::where('tailor_id',$id)->get();
        $user=User::where('id',$id)->value('name');
      
        $tailor=Helper::userIdToName($id);
        if($users)
        {    $data="found";
            return view('user.rating-detail', compact('users','user','data'));            
        }
        else
        {

            $data="No_reviewd_yet";
            return view('user.rating-detail', compact('data','user')); 
            
        }

    }
}  




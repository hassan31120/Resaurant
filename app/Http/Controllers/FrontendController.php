<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Meal;
use App\Models\Order;


class FrontendController extends Controller
{

    public function index(Request $request)
    {
        if (!$request->category) {
            $meals = Meal::latest()->get();
            return view('frontend' , compact('meals'));
        }

        $meals = Meal::where('category' , $request->category)->get();
        return view('frontend' , compact('meals'));

    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        if($request->small_meal == 0 && $request->medium_meal == 0 &&  $request->large_meal == 0 ){
            return back()->with('errmessage' , 'Please Order atleast One Meal');
        }

        Order::create([
            'user_id' => auth()->user()->id,
            'date' => $request->date,
            'time' => $request->time,
            'phone' => $request->phone,

            'meal_id' => $request->meal_id,
            'small_meal' => $request->small_meal,
            'medium_meal' => $request->medium_meal,
            'large_meal' => $request->large_meal,
            'body' => $request->body,
        ]);

        return back()->with('message' , 'Your Order Was Successfully');

    }


    public function show($id)
    {
        $meal = Meal::find($id);
        return view('show_meal' , compact('meal'));
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

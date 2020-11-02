<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour;
use App\Country;
use App\Operator;

class ToursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $countries = Country::all();
        $tours = Tour::with(['country', 'operator'])->get();
        return view('tours.index', ['tours' => $tours]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $countries = Country::pluck('title','id')->all();
        $operators = Operator::pluck('title','id')->all();

        return view('tours.create', compact(
            'countries',
            'operators'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'country_id' => 'required',
            'operator_id' => 'required'
        ]);

        Tour::create($request->all());
        return redirect()->route('tours.index');
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
        $countries = Country::pluck('title','id')->all();
        $operators = Operator::pluck('title','id')->all();
        $tour = Tour::find($id);
        return view('tours.edit', ['tour'=>$tour], compact(
            'countries',
            'operators'
        ));
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
        $this->validate($request, [
            'title' => 'required',
            'country_id' => 'required',
            'operator_id' => 'required'
            ]);
    
        $tour = Tour::find($id);
        $tour->update($request->all());
    
        return redirect()->route('tours.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tour::find($id)->delete();
        return redirect()->route('tours.index');
    }
}

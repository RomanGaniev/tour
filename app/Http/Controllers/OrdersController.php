<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;
use App\Order;
use App\Permit;
use App\Tour;
use Illuminate\Database\Eloquent\Builder;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with(['permit' => function($builder) {
            $builder->with('tour');

        }])->get();
        
        return view('orders.index', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tours = Tour::pluck('id','id')->all();

        return view('orders.create', compact(
            'tours'
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
    //    dd($request);

        $this->validate($request, [
        'permit_id' => 'required',
        'klient' => 'required'
        ]);
        
        
        Order::create($request->all())->togglePayment($request->get('oplata'));
        return redirect()->route('orders.index');
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
    public function edit($tour_id)
    {   
        // 
    }

    public function nextEdit($id, $tour_id, $klient)
    {
        $orders = Order::with(['permit' => function($builder) {
            $builder->with('tour');

        }])->get();
        
        $tours = Tour::pluck('id','id')->all();

        $pers = Permit::select('id')->where('tour_id', '=', $tour_id)->pluck('id','id')->all();
        
        return view('orders.nextedit', [
            'id' => $id,
            'tour_id' => $tour_id,
            'klient' => $klient, 
            'orders' => $orders], compact(
            'tours',
            'pers'
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
            'permit_id' => 'required',
            'klient' => 'required'
            ]);
    
        $order = Order::find($id);
        $order->update($request->all());
        $order->togglePayment($request->get('oplata'));

        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::find($id)->delete();
        return redirect()->route('orders.index');
    }

    public function next(Request $request, $id, $tour_id, $klient)
    {
        $tour_next_id = $request->get('tour_next_id');

        $orders = Order::with(['permit' => function($builder) {
            $builder->with('tour');

        }])->get();

        $tours = Tour::pluck('id','id')->all();

        $pers = Permit::select('id')->where('tour_id', '=', $tour_next_id)->pluck('id','id')->all();

        return view('orders.nextedit', [
            'id' => $id,
            'tour_id' => $tour_next_id,
            'klient' => $klient, 
            // 'permits' => $permits, 
            'orders' => $orders], compact(
            'tours',
            'pers'
        ));
    }



    public function nextCreate(Request $request)
    {
        $this->validate($request, [
            'tour_id' => 'required'
            ]);
        
        $tour_next_id = $request->get('tour_next_id');
        
        $t_id = $request->get('tour_id');
        
        $permits = Permit::with(['tour'])->where('tour_id', '=', $t_id)->get();
        
        $permits = $permits->pluck('id','id');
        
        $orders = Order::with(['permit' => function($builder) {
            $builder->with('tour');

        }])->get();

        return view('orders.nextcreate', compact(
            'permits'
        ));
    }
}

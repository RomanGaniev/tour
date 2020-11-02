<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour;
use App\Country;
use App\Operator;
use App\Permit;

class PermitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tours = Tour::all();
        $permits = Permit::with(['tour'])->get();
        return view('permits.index', ['permits' => $permits]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Responsev
     */
    public function create()
    {
        $tours = Tour::pluck('title','id')->all();
        // $operators = Operator::pluck('title','id')->all();

        return view('permits.create', compact(
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
        $this->validate($request, [
        'tour_id' => 'required',
        'people' => 'required|integer',
        'full_cost' => 'required|integer',
        'discount' => 'nullable|integer|lte:full_cost'
        // 'discount_price' => 'required|integer'
        ]);
        $f_c = $request->get('full_cost');
        $dis = $request->get('discount');
        $res = $f_c - $dis;
        
        // echo "введенная стоимость со скидкой:". $dp ."<br>"."полн.стоимость:". $f_c ."<br>" ."скидка:".  $dis ."<br>" ."полн-скидка:".  $res;
        
        $request->request->add(['discount_price' => $res]);
        // dd($request);

        $permit = Permit::create($request->all());
        $permit->toggleFood($request->get('food'));
        $permit->toggleRes($request->get('residence'));
        $permit->toggleFire($request->get('status'));

        // Country::create($request->all())->toggleVisa($request->get('visa'));

        return redirect()->route('permits.index');
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
        $tours = Tour::pluck('title','id')->all();
        $permit = Permit::find($id);
        return view('permits.edit', ['permit'=>$permit], compact(
            'tours'
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
            'tour_id' => 'required',
            'people' => 'required|integer',
            'full_cost' => 'required|integer',
            'discount' => 'nullable|integer|lte:full_cost'
            // 'discount_price' => 'required|integer'
            ]);

        $f_c = $request->get('full_cost');
        $dis = $request->get('discount');
        $res = $f_c - $dis;
        $request->request->add(['discount_price' => $res]);

        $permit = Permit::find($id);
        $permit->update($request->all());
        $permit->toggleFood($request->get('food'));
        $permit->toggleRes($request->get('residence'));
        $permit->toggleFire($request->get('status'));

        return redirect()->route('permits.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Permit::find($id)->delete();
        return redirect()->route('permits.index');
    }
}

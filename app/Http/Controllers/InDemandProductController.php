<?php

namespace App\Http\Controllers;

use App\Models\InDemandProduct;
use Illuminate\Http\Request;

class InDemandProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $indemands=InDemandProduct::all();
       return view('pages.indemand.index', compact('indemands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.indemand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,[
           'product_name'=>'required',
           'source_of_information'=>'required',
           'market_trend'=>'required',
           'market_rate'=>'required',
           'note'=>'required'
       ]);
      $indemands=InDemandProduct::create([
          'product_name'=>$request->product_name,
          'source_of_information'=>$request->source_of_information,
          'market_rate'=>$request->market_rate,
          'market_trend'=>$request->market_trend,
          'note'=>$request->note,
      ]);
      if($indemands!==null)
        { return redirect()->route('indemand.index')->with('success','data inserted suceesfully....');
        }
        return redirect()->route('indemand.index')->with('failure',' data insertion failed......!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InDemandProduct  $inDemandProduct
     * @return \Illuminate\Http\Response
     */
    public function show(InDemandProduct $inDemandProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InDemandProduct  $inDemandProduct
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $indemands=InDemandProduct::find($id);
        return view('pages.indemand.edit',compact('indemands'));
    }


    public function update(Request $request ,$id)
    {
        $indemands=InDemandProduct::find($id);
        $indemands->update([
            'product_name'=>$request->product_name,
            'source_of_information'=>$request->source_of_information,
            'market_rate'=>$request->market_rate,
            'market_trend'=>$request->market_trend,
            'note'=>$request->note,
        ]);
        return redirect()->route('indemand.index')->with('success','data updation successfull>.....!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InDemandProduct  $inDemandProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        dd($inDemandProduct);
        $indemands = InDemandProduct::find($id);

        $indemands->delete();
        return redirect()->route('indemand.index')->with('success', 'data deletion successfulll......');
    }
}

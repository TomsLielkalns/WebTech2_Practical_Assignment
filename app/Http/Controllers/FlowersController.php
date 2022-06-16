<?php

namespace App\Http\Controllers;
use App\Models\Flowers;
use App\Models\Specifics;
use Illuminate\Http\Request;

class FlowersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->filled('search'))
        {
            $flowers  = Flowers::where('name', 'LIKE', '%'.$request->search.'%')->get();
            //$specifics = Specifics::where('species', 'LIKE', '%'.$request->search.'%')->orWhere('color', 'LIKE', '%'.$request->search.'%')->orWhere('bloom_season', 'LIKE', '%'.$request->search.'%')->orWhere('lenght_mm', 'LIKE', '%'.$request->search.'%')->orWhere('other', 'LIKE', '%'.$request->search.'%')->get();
        }
        else
        {
            $flowers = Flowers::all();
        }
        return view('main_page', compact('flowers'));
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

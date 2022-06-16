<?php

namespace App\Http\Controllers;
use App\Models\Flowers;
use App\Models\Specifics;
use App\Models\Submissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FlowerAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flowers = Flowers::all();
        return view('adminDashboard', compact('flowers'));
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

    public function approve($id)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Submissions::findOrFail($id)->delete();
        $count = ((Specifics::where('id', '>=', 1000)->get())->count());
        $newID = $count + 1000;

        $flower = Flowers::find($id);
        $flower->id=$newID;
        $flower->specifics_id=$newID;
        $flower->save();

        $specifics = Specifics::find($id);
        $specifics->id=$newID;
        $specifics->save();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        return redirect('admin');
    }

    public function view($id)
    {
        $specifics = Specifics::where('id','=',$id)->get();
        return view('adminSpecifics', compact('specifics'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $flower = Flowers::findOrFail($id);
        $specifics = Specifics::findOrFail($id);
        return view('adminEdit', compact('flower'), compact('specifics'));
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
        $allowed = array(
            'flower_name' => 'required|string|max:30',
            'species'=>'nullable|string|max:50',
            'color'=>'required|string|max:10',
            'bloom_season'=>'required|string|max:50',
            'lenght_mm'=>'required|integer',
            'other'=>'nullable|string'
        );

        $this->validate($request, $allowed);

        $flower = Flowers::findOrFail($id);
        $flower->name = $request->flower_name;
        $flower->save();

        $specifics = Specifics::findOrFail($id);
        $specifics->species = $request->species;
        $specifics->color = $request->color;
        $specifics->bloom_season = $request->bloom_season;
        $specifics->lenght_mm = $request->lenght_mm;
        $specifics->other = $request->other;
        $specifics->save();

        return redirect('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Submissions::findOrFail($id)->delete();
        Flowers::findOrFail($id)->delete();
        Specifics::findOrFail($id)->delete();
        return redirect('admin');
    }
}

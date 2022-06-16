<?php

namespace App\Http\Controllers;
use App\Models\Specifics;
use App\Models\Flowers;
use App\Models\User_data;
use App\Models\Submissions;
use Illuminate\Http\Request;

class SpecificsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($flower_id)
    {
        $specifics = Specifics::where('id', '=', $flower_id)->get();
		return view('specifics', ['specifics' => $specifics]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(((Specifics::where('id', '<', 1000)->get())->count())>=999)
        {
            echo("We cannot accept any more submissions at this time, please come again later");
        }
        else
        {
            $users = User_data::all();
            return view('flower_new', compact('users'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $allowed = array(
            'users_id' => 'required|integer',
            'name' => 'required|string|max:30',
            'species' => 'required|string|max:50',
            'color' => 'required|string|max:10',
            'bloom_season' => 'required|string|max:50',
            'lenght_mm' => 'required|integer',
            'other' => 'nullable|string|max:50'
        );

        $this->validate($request, $allowed);
        $indexlist = Specifics::where('id', '<', 1000)->get();
        $index = $indexlist->count()+1;

        $specifics = new Specifics();
        $specifics->id = $index;
        $specifics->species = $request->species;
        $specifics->color = $request->color;
        $specifics->bloom_season = $request->bloom_season;
        $specifics->lenght_mm = $request->lenght_mm;
        $specifics->other = $request->other;
        $specifics->save();

        $flower = new Flowers();
        $flower->id = $specifics->id;
        $flower->specifics_id = $specifics->id;
        $flower->name = $request->name;
        $flower->save();

        $submission = new Submissions();
        $submission->id = $specifics->id;
        $submission->users_id = $request->users_id;
        $submission->specifics_id  = $specifics->id;
        $submission->save();
        
        return redirect('/');
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

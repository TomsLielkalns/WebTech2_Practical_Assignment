<?php

namespace App\Http\Controllers;
use App\Models\Comments;
use App\Models\Flowers;
use App\Models\User_data;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($flower_id)
    {
        $comments = Comments::where('flowers_id', '=', $flower_id)->get();
		return view('comments', ['comments' => $comments, 'flowers_id' => $flower_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($flowers_id)
    {
        $flower = Flowers::findOrFail($flowers_id);
        $users = User_data::all();
        return view('comment_new', compact('flower'), compact('users'));
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
            'comment' => 'required|string|min:1|max:256',
            'users_id' => 'required|integer'
        );

        $this->validate($request, $allowed);
        $comment = new Comments();
        $comment->users_id = $request->users_id;
        $comment->flowers_id = $request->flowers_id;
        $comment->comment = $request->comment;
        $comment->save();
        return redirect('/flower/comments/' . $comment->flowers_id);
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

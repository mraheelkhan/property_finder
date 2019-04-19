<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Auth;
use Session;

class CommentController extends Controller
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
        $userId = Auth::user()->id;
        $status = 'active';
        $validated = $request->validate([   
            "listing_id" => 'required|max:3',
            "comment_body" => 'required|max:200',
            ]);
        
        $comment = Comment::create([
            'user_id' => $userId,
            'listing_id' => request('listing_id'),
            'comment_body' => request('comment_body'),
            'status' => 'active',
        ]);
        
        Session::flash('message', 'Your new Comment is posted successfully. <script>swal.firePP("Posted","Your new Comment is posted successfully", "success");</script>'); 
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CommentController  $commentController
     * @return \Illuminate\Http\Response
     */
    public function show(CommentController $commentController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CommentController  $commentController
     * @return \Illuminate\Http\Response
     */
    public function edit(CommentController $commentController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CommentController  $commentController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommentController $commentController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CommentController  $commentController
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommentController $commentController)
    {
        //
    }
}

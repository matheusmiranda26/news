<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\News;
use App\Models\Tags;
use Illuminate\Support\Str;


class NewsAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return News::with('user', 'category', 'tags')->get();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $new = new News();
        $new->title = $req->title;
        $new->body = $req->body;
        $new->user()->associate($req->user_id);
        $new->category()->associate($req->category_id);
        $tags = Tags::find($req->tags_id);
        $new->save();
        $new->tags()->attach($tags);
        return $new;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return News::with('user', 'category', 'tags')->find($id);
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $new = News::findOrFail($id);
        $new->title = $req->title;
        $new->body = $req->body;
        $new->user()->associate($req->user_id);
        $new->category()->associate($req->category_id);
        $tags = Tags::find($req->tags_id);
        $new->tags()->detach($tags);
        $new->save();
        return $new;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::destroy($id);
    }

    public function showByCategories($id) {
       return News::with('user', 'category')->where('category_id', $id)->get();
    }
}

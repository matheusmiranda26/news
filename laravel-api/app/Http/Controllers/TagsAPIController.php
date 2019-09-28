<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tags;

class TagsAPIController extends Controller
{
    
    public function index() {
        return Tags::all();
    }

    public function store(Request $req) {
        $tags = Tags::create($req->all());
        return $tags;
    }

    public function update(Request $req, $id) {
        $tag = Tags::findOrFail($id);
        $tag->update($req->all());
        return $tag;
    }

    public function show($id) {
        return Tags::findOrFail($id);
    }

    public function destroy($id) {
        Tags::destroy($id);
    }
}

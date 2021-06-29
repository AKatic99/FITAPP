<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;     
use Illuminate\Support\Facades\Storage;

class PostController extends Controller


{

    public function getPosts() {
        return post::all();
    }


    public function napraviPost(Request $request){
        
        //TODO::validate input

        $request->validate([
        'naslov' => ['required', 'string', 'min: 5', 'max: 30'],
        'tekst' => ['required', 'string', 'min: 5', 'max: 30'],
        'spol' => ['required'],
        'more_info' => ['required', 'string', 'min: 5', 'max: 250'],
        
    ]);

    
       // dd($request);
        $ime_slike =  $request->photo->getClientOriginalname();
        Post::create([
            'naslov' => $request->naslov,
            'tekst' => $request->tekst,
            'spol' => $request->spol,
            'slika' => $ime_slike,
            'more_info' => $request->more_info,
        ]);
        $request->photo->storeAs('storage', $ime_slike, 'public');
    }
    public function viewPost($id) {
        if (DB::table('posts')->where('id', $id)->exists()){
            return DB::table('posts')->where('id', $id)->get();
        } else {
            return 0;
        }
    }
/*
    public function getPostDetails($postId) {
        if (DB::table('posts')->where('id', $postId)->exists()){
            return DB::table('posts')->where('id', $postId)->get();
        } else {
            return "AAAAAA";
        }
    }*/
    public function editPost(Request $request, $id) {
        //First validate the textual components
        $request->validate([
            'naslov' => ['required', 'string', 'min: 5', 'max: 30'],
            'tekst' => ['required', 'string', 'min: 5', 'max: 30'],
            'spol' => ['required'],
            'more_info' => ['required', 'string', 'min: 5', 'max: 250'],
        ]);

        //Check if there is a new image. If no, just save changes. If yes, update it.
        if ($request->newImage == 0) {
            DB::table('posts')->where('id', $id)->update([
            'naslov' => $request->naslov,
            'tekst' => $request->tekst,
            'spol' => $request->spol,
        
            'more_info' => $request->more_info,
            ]);
        } else {
            //Fetch the new picture's name, but KEEP the old one in storage!
            $ime_slike= $request->photo->getClientOriginalName();
            $request->photo->storeAs('posts', $ime_slike, 'public');

            DB::table('posts')->where('id', $id)->update([
            'naslov' => $request->naslov,
            'tekst' => $request->tekst,
            'spol' => $request->spol,
            'slika' => $ime_slike,
            'more_info' => $request->more_info,
            ]);
        }
    }

    //Checks if the user is subscribed to the currently displayed article
   

   
    public function deletePost($id) {
        //First any active user subscriptions to the article to avoid breaking any FK constraints
        DB::table('posts')
            ->where('id', '=', $id)
            ->delete();
    }
}





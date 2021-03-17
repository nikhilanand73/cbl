<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

use App\Http\Requests\PostStoreRequest;
class PostController extends Controller
{
  // public function addPost(){
  //     return view('add-post');
  // }

  public function createPost(Request $request){

    //dd($request);

    $post=new Post();
    $post->title=$request->title;
    $post->body=$request->body;
    $post->save();
    // return back()->with('post_created','Post has been created successfully!');
    return redirect('crud');
}
public function getPost(){

  // $posts= Post::orderBy('id','DESC')->get();
  // $posts= Post::all();
  $posts= Post::orderBy('id','DESC')->get();
  // echo $posts;
    return view('crud',compact('posts'));
}
public function getPostById($id){
  $posts= Post::where('id',$id)->first();
  return view('single-post',compact('posts'));
}
public function deletePost($id){
  Post::where('id',$id)->delete();
  // return back()->with('post_deleted','Post has been deleted successfully!');
  return redirect('crud');
}
public function editpost($id){
  $post= Post::find($id);
  return view('forms/wizard',compact('post'));
}
public function updatePost(Request $request){
  $post= Post::find($request->id);
  $post->title=$request->title;
  $post->body=$request->body;
  $post->save();
  // return back()->with('post_updated' , 'Post has been updated successfully!');
  return redirect('crud');
}


}
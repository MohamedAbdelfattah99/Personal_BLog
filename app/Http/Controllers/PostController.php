<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Tag;
use Illuminate\Support\Facades\Storage;
class PostController extends Controller
{
   public function __construct(){
       $this->middleware('checkCategory')->only('create');
   }
    public function index()
    {
        return view('posts.index')->with('posts',Post::all());
    }

   
    public function create()
    {
        return view('posts.create')->with('categories',Category::all())->with('tags',Tag::all());
    }


    
    public function store(PostRequest $request)
    {
       Post::create([
           'title'=>$request->title,
           'desc'=>$request->desc,
           'content'=>$request->content,
           'image'=>$request->image->store('images','public') ,
           'category_id'=>$request->CategoryId
           
       ]);
        session()->flash('success',"Post Added ");
        return redirect(route('posts.index'));
    }

 
    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $posts=Post::find($id);
       return view('posts.create')->with('post',$posts)->with('categories',Category::all()); 
    }

  
    public function update(UpdatePostRequest $request,Post $post)
    {
        $data=$request->only(['title','dec','content']);
        if($request->hasFile('image')){
            $image=$request->image->store('images','public');
             Storage::disk('public')->delete($post->image);   
            $data['image']=$image;
        }
        $post->update($data);
         session()->flash('success',"Post updated ");
         return redirect(route('posts.index'));


    }

  
    public function destroy($id)
    {
        /*$post->delete();
            session()->flash('success',"Post trashed ");
        return redirect(route('posts.index'));
    */
        $post=Post::withTrashed()->where('id',$id)->first();
        if($post->trashed()){
            Storage::disk('public')->delete($post->image);   
            $post->forceDelete();
        }
        else{
            $post->delete();
        }
        session()->flash('success',"Post trashed ");
        return redirect(route('posts.index'));
    }
    public function trash(){
        $trash=Post::onlyTrashed()->get();
        return view('posts.index')->with('posts',$trash);
    }
    public function restore($id){
    Post::withTrashed()->where('id',$id)->restore();
  session()->flash('success',"Post restored ");
        return redirect(route('posts.index'));
        
    }
}

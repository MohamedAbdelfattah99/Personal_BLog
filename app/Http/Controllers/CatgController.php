<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\CtegoryRequest;
class CatgController extends Controller
{
    public function index()
    {
        return view('categories.index')->with('categories',Category::all());
    }

  
    public function create()
    {
        return view('categories.create');
    }


    public function store(CtegoryRequest $request)
    {
       
       Category::create($request->all());
        session()->flash('success','Category added');     
        return redirect(route('categories.index'));
    }

 
    public function show($id)
    {
        //
    }

  
    public function edit($id)
        
    {
        $cat=Category::find($id);
        return view('categories.create')->with('cat',$cat);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CtegoryRequest $request, $id)
    {
       /* $request->validate([
             "name"=>"required|unique:categories" 
            
        ])
            */
        $cat=Category::find($id);
        $cat->name=$request->name;
        $cat->save();
                session()->flash('success','Category updated');     

        return redirect(route('categories.index'));
    }

    public function destroy($id)
    {
        $cat=Category::find($id);
        $cat->delete();
        session()->flash('success','Category Deleted');     

        return redirect(route('categories.index'));
               

        
    }
}

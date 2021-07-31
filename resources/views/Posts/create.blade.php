@extends('layouts.app')
@section('content')


          <div class='card card-default'>
<div class='card-header'>
    {{isset($post)? 'Update Post':  'Add new post'}}
    
    <div class='card-body'>
      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

              <form action="{{isset($post)?route('posts.update',$post->id):route('posts.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                  @if(isset($post))
                  @method('PUT')
                @endif
                  <div class="form-group">
                  <label for="post name"> Title:</label>
                      <input class="form-control" type="text" name="title" value="{{isset($post)?$post->title:''}}">
                    
                  </div>
                  
                     <div class="form-group">
                  <label for="post desc"> Descrption:</label>
                    <textarea  name="desc" class="form-control" row="3" >{{isset($post)?$post->desc:''}}</textarea>   
                  </div>
                     <div class="form-group">
                  <label for="post content"> Contect:</label>
                <textarea  name="content"  class="form-control" row="3">{{isset($post)?$post->content:''}}</textarea>                    
                  </div>
                      <div class="form-group">
                  <label for="Select category"> Select Category:</label>
                          <select name="CategoryId" class="form-control">
                          @foreach($categories as $cat)
                              <option value="{{$cat->id}}">{{$cat->name}}</option>
                              @endforeach
                          </select>
                  </div>
                    <div class="form-group">
                  <label for="Select tags"> Select Tgas:</label>
                          <select name="tags[]" class="form-control" multiple>
                          @foreach($tags as $tag)
                              <option value="{{$tag->id}}">{{$tag->name}}</option>
                              @endforeach
                          </select>
                  </div>
                  @if(isset($post))
                  <div class="form-group">
                  <img src="{{asset('storage/'.$post->image)}}" style="width: 100%">
                  
                  </div>
                    @endif
                     <div class="form-group">
                  <label for="post image">Image</label>
                      <input type="file" class="form-control" name="image">
                    
                  </div>
          <div class="form-group">
                <button class='btn btn-success'>{{isset($post)?'update':'Add'}}</button>
              
                  </div>
                  
        </form>
              
              
              
              </div>
</div>
@endsection


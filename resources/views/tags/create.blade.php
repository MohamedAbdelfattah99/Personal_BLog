@extends('layouts.app')
@section('content')

          <div class='card card-default'>
<div class='card-header'>
    {{isset($tags)?"Update Tags":"Add New Tag"}}</div>
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

              <form action="{{isset($tags)?route('tags.update',$tags->id):route('tags.store')}}" method="POST">
                @csrf
                  @if(isset($tags))
                @method('PUT')
                  @endif
                  <div class="form-group">
                  <label for="category">Tag Name:</label>
                      <input type="text" name="name"  value="{{isset($tags)?$tags->name:''}}">
                    
                  </div>
                  
          <div class="form-group">
                <button class='btn btn-success'>{{isset($tags)?"Update ":"Add"}}</button>
              
                  </div>
                  
        </form>
              
              
              
              </div>
</div>
@endsection

@extends('layouts.app')
@section('content')

          <div class='card card-default'>
<div class='card-header'>
    {{isset($cat)?"Update Category":"Add New Category"}}</div>
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

              <form action="{{isset($cat)?route('categories.update',$cat->id):route('categories.store')}}" method="POST">
                @csrf
                  @if(isset($cat))
                @method('PUT')
                  @endif
                  <div class="form-group">
                  <label for="category">Category Name:</label>
                      <input type="text" name="name"  value="{{isset($cat)?$cat->name:''}}">
                    
                  </div>
                  
          <div class="form-group">
                <button class='btn btn-success'>{{isset($cat)?"Update ":"Add"}}</button>
              
                  </div>
                  
        </form>
              
              
              
              </div>
</div>
@endsection

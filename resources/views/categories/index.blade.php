@extends('layouts.app')
@section('content')
       @if(session()->has('error'))

                      <div class="alert alert-danger">
                          
                    {{session()->get('error')}}
</div>
                          @endif
<a href="{{route('categories.create')}}" class='btn btn-success'>Add Category</a>
<div class='card card-default'>
<div class='card-header'></div>
    <div class='card-body'>
    <table class='table'>
        <table class='table'>
       <tbody>
        @foreach($categories as $cat)
           <tr><td>
            
            {{$cat->name}}
            </td>
              <td>
                  <form method="POST" action="{{route('categories.destroy',$cat->id)}}">
                  @csrf
                      @method('DELETE')
                      <button class="btn btn-primary float-right mr-4">Delete</button>
                  
                  
                  
                  </form>
               <a href="{{route('categories.edit',$cat->id)}}" class='btn btn-primary float-right mr-4'>Edit</a>

               
               </td>
           </tr>
        
        @endforeach
           </tbody>
        </table>
        </table>
    </div>
</div>
@endsection
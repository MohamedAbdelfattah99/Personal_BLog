@extends('layouts.app')
@section('content')
<a href="{{route('posts.create')}}" class='btn btn-success'>Add post</a>

<div class='card card-default'>
<div class='card-header'></div>
    <div class='card-body'>
    <table class='table'>
        <table class='table'>
            <thead>
            <tr>
                
                <th>Title</th>
                <th>Image</th>
                <th>Action</th>
                </tr>
            
            
            </thead>
       <tbody>
        @foreach($posts as $post)
           <tr>
               <td>
            
            {{$post->title}}
            </td>
            <td>
            <img src="{{asset('storage/'.$post->image)}}" alt="" width="100px" height="50px">
            </td>
              <td>
                  <form method="POST" action="{{route('posts.destroy',$post->id)}}">
                  @csrf
                      @method('DELETE')
                      <button class="btn btn-primary float-right mr-4">{{($post->trashed())? 'delete':'trash'}} </button>
                  
                  
                  
                  </form>
                  @if($post->trashed()==null)

               <a href="{{route('posts.edit',$post->id)}}" class='btn btn-primary float-right mr-4'>Edit</a>
                  @else
                 <a href="{{route('restore',$post->id)}}" class='btn btn-primary float-right mr-4'>Restore</a>

               @endif
               </td>
           </tr>
        
        @endforeach
           </tbody>
        </table>
        </table>
    </div>
</div>
@endsection


@extends('layouts.app')
@section('content')


    <head> 
            <link rel="stylesheet" href="{{asset('css/style.css')}}">
    </head>

    <style> 
    .btnnnn{
        width: 10%;
        margin-top: -1.50cm;
        margin-right: 25%;
/*         border: 3px solid black;
 */    }</style>
    <div class="cnt">
        <div class="btnuy">
            @if (auth()->check() && $post->user_id == auth()->user()->id)
        
            @include('blog.edit')
            @endif
        </div>
        <div class="btnnnn">
            @if (auth()->check() && $post->user_id == auth()->user()->id)
            <form method="post" action="{{route('home.destroy',$post)}}">
                @csrf
                @method('DELETE')
                <button  class="btnuser"type="submit">
                    <i >delete</i>
                </button>
            </form>
            
            @endif
        </div>
    </div>


<div class="con ">
    <div>
        <img src="{{asset('assets/images/produits') }}/{{$post->image}}" alt="image">

    </div>
    <div class="para">
        
        <h2>{{$post->title }} </h2>
        <p class="p11"><span>By:</span> <span class="non">{{$post->users->name}} </span> <span class="non">On</span> <span class="non">{{$post->created_at}}</span> </p>

        <p class="p2">{{$post->description}}</p> 

    </div>

  

</div>



@endsection

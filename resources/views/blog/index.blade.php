
@extends('layouts.app')
@section('content')


<h1 class="postss">All Posts</h1>
<br> <br> <br>

@if (auth()->check())

@include('blog.create')

@endif




@foreach($post as $key)


    
<div class="con ">
    <div>
        <img src="{{asset('assets/images/produits') }}/{{$key->image}}" alt="image">
    </div>
    <div class="para">

<h2>{{$key->title}}</h2>
  <p class="p11"><span>By:</span> <span class="non">{{$key->users->name}} </span> <span class="non">On</span> <span class="non">{{$key->created_at}}</span> </p>

        <p class="p2">{{$key->description}}</p> 

        <a class="p3" href="{{ route('home.show', ['id' => $key->id]) }}">Read More </a>
    </div>
</div>


@endforeach


<style>
    .pag{
        background-color: rgb(255, 255, 255);
    }
</style>


<div  class="d-flex justify-content-center mb-5 mt-5">
    {{ $post->links('pagination::simple-bootstrap-5') }}
</div>









@endsection

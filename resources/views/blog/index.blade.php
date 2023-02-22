
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
        <img src="{{ asset('storage/' . $key->image) }}" alt="image">
    </div>
    <div class="para">
        <h2>{{$key->title}}</h2>
        <p class="p11"><span>By:</span> <span class="non">{{$key->users->name}} </span> <span class="non">On</span> <span class="non">{{$key->created_at}}</span> </p>

        <p class="p2">{{$key->description}}</p> 

        <a class="p3" href="/edf">Read More </a>
    </div>
</div>
@endforeach










<div class="footer ">
    <ul>
        <ol > <a class="xxxx" href="">Blogger</a> </ol>
        
        <ol class="list">Home</ol>
        <ol class="list">Contact</ol>
        <ol class="list">About</ol>

    </ul>

</div>

@endsection

@extends('layouts.app')

@section('content')

{{-- <img src="{{ asset('storage/' . $post->image) }}" alt="image">
 --}}
<form action="" method="POST" enctype="multipart/form-data" >
    @csrf
    @method('PUT')
<label for="">titre</label>
<input type="text" name="title" class="form-control" value="{{$post->title}}">
<br>

<input type="file" name="image" class="form-control" accept="image/*" value="{{$post->image}}">

<input type="hidden" name="oldimg" class="form-control" accept="image/*" value="{{ $post->image }}">

<br>
@foreach ($user as $key )
    
<input type="hidden"  name="user_id" value="{{$key->id}}">
@endforeach

<label for="des">descrption</label>
<textarea name="description" id="description" rows="5" class="form-control">{{$post->description}}</textarea>
<br>

<button type="submit" class="btn btn-primary">envoyer</button>
</form>
@endsection
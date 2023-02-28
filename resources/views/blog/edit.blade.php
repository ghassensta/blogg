@section('content')
<head>
    @include('parials.lien')           

</head>

<style>
    .btnuserr{
        margin-left: 45px;
        color: aliceblue;
padding: 10px;
background-color: rgba(0, 68, 255, 0.849);
border-color: rgba(0, 68, 255, 0.849);
font-weight: 600;
    }
    .up{
        height: 200px;
        width: 250px;
        margin:10px;
        margin-left: 24%;
        border-radius: 2%;

    }
</style>


<div class="container">
    <!-- Trigger the modal with a button -->
    <button type="button" class="btnuserr" data-toggle="modal" data-target="#myModal">Update Post</button>

    <!-- Modal -->


    <form action="{{ route('home.update',$post->id)}}" method="POST" enctype="multipart/form-data" >
        @csrf
    @method('PUT')
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Post</h4>
 
            </div>
            <div class="modal-body">

                <img class="up" src="{{asset('assets/images/produits') }}/{{$post->image}}" alt="image">
                <br>

<label for="title">titre</label>
<input type="text" name="title" class="form-control" value="{{$post->title}}">
<br>

<input type="file" name="img" class="form-control" accept="image/*" value="{{ $post->image }}">
<input type="hidden" name="oldimg" class="form-control" accept="image/*" value="{{ $post->image }}"><br>
@foreach ($user as $key )
    
<input type="hidden"  name="user_id" value="{{$key->id}}">
@endforeach

<label for="description">descrption</label>
<textarea name="description" id="description" rows="5" class="form-control">{{$post->description}}</textarea>
<br>

<button type="submit" class="btn btn-primary">envoyer</button>
</form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

</div>

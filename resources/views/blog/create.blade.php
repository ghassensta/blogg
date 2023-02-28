


<head>
    @include('parials.lien')           

</head>
<style>
    .oooo{
        padding: 10px;
        border-radius: 5px;
        color: aliceblue;
        background-color:  rgb(25, 45, 75);
        cursor: pointer;
    }

    .oooo:hover{
        cursor: pointer;
    }
</style>
    <div class="container">
        <!-- Trigger the modal with a button -->
        <button type="button" class="oooo" data-toggle="modal" data-target="#myModal">Add New Post</button>

        <!-- Modal -->
 
                        
<form action="{{route('home.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Post</h4>
                </div>
                <div class="modal-body">


<label for="">titre</label>
<input type="text" name="title" class="form-control">
<br>

<input type="file" name="img" class="form-control" accept="image/*">
<br>
@foreach ($user as $key )
    
<input type="hidden"  name="user_id" value="{{$key->id}}">
@endforeach

<label for="des">descrption</label>
<textarea name="description" id="description" rows="5" class="form-control"></textarea>
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








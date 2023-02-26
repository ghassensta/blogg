



    <head>     <link rel="stylesheet" href="{{asset('css/style.css')}}">
    </head>
    
<div class="con ">
    <div>
        <img src="{{ asset('storage/' . $red->image)  }}" alt="image">

    </div>
    <div class="para">
        <h2>{{$red->title}} </h2>
        <p class="p11"><span>By:</span> <span class="non">{{$red->users->name}} </span> <span class="non">On</span> <span class="non">{{$red->created_at}}</span> </p>

        <p class="p2">{{$red->description}}</p> 

    </div>

    <style>
        .btnuser{
            color: aliceblue;
            padding: 10px;
            background-color: rgba(255, 0, 0, 0.849);
            border-color: red;
            font-weight: 600;
            margin-left: 75%;
        }
    </style>

</div>
<div class="btnu">
    @if (auth()->check() && $red->user_id == auth()->user()->id)
    <form method="post" action="{{route('home.destroy',$red)}}">
        @csrf
        @method('DELETE')
        <button  class="btnuser"type="submit">
            <i >delete</i>
        </button>
    </form>@endif
</div>



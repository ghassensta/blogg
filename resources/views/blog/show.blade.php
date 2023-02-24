


    
    
<div class="con ">
    <div>
        <img src="{{ asset('storage/' . $red->image)  }}" alt="image">

    </div>
    <div class="para">
        <h2>{{$red->title}} </h2>
        <p class="p11"><span>By:</span> <span class="non">{{$red->users->name}} </span> <span class="non">On</span> <span class="non">{{$red->created_at}}</span> </p>

        <p class="p2">{{$red->description}}</p> 

    </div>
</div>



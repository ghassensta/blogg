<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Post;


use Illuminate\Http\Request;


class PostsController extends Controller
{


    function optimiser(object $ch, string $name): string
    {
        $imageName = $name .time() . '.' . $ch->extension();
        $ch->move(public_path('assets/images/produits'), $imageName);
        return $imageName;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



    $post = Post::with('users')->paginate(6);
        $user=User::all();

       //dd($post);

        return view('blog.index',compact('post'),compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=User::all();

        return view('blog.create',compact('user'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       //dd($request);
        $request->validate([
            'title' => 'required',
            'description' => 'required',

        ]);
            
    
        if ($request->hasFile('img')){
            $imageName = $this->optimiser($request->img,"image");
        }
   
        
        $post = Post::create([

            'title' => $request->title,
           'image' => $imageName,
            'description' =>$request->description,
            'user_id' =>$request->user_id,
        ]);

        $post->save();

        return redirect()->route('home.blog');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {

        $red = Post::findOrFail($id);
       // dd($red) ;
        // récupère le modèle en fonction de l'ID, ou renvoie une erreur 404 si non trouvé
        return view('blog.show', ['red' => $red]); // renvoie la vue avec le modèle en tant que variable
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $user = User::all();
        //dd($post,$user);
        return view('blog.edit', compact('post', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
      // dd($request);
      $request->validate([
        'title' => 'required',
        'description' => 'required',
    ]);

/*     if ($request->hasFile('img')){

        $imageName = $this->optimiser($request->img,"image");
    } else{

        $imageName=$request->oldimg;

    }   */

   /*  if($request->hasFile('img')){
        $imageName = time() . '.' . $request->img->extension();
        $request->img->move(public_path('storage/.'), $imageName);

    }else{

        $imageName=$request->oldimg;

    }  */

    
    if ($request->hasFile('img')){
        $imageName = $this->optimiser($request->img,"image");
    }else{

        $imageName=$request->oldimg;

    }

    $post = Post::find($post->id);
    $post->title = $request->title;
    $post->description = $request->description;
    $post->image = $imageName;
    //dd($post);

    $post->save();
    return redirect()->route('home.blog');}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $Post)
    {
         $Post->delete();
        return redirect()->route('home.blog');
    }
}

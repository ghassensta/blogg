<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Post;


use Illuminate\Http\Request;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



    $post = Post::with('users')->paginate(3);
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
            
    
           $image = $request->file('image')->store('uploads','public');
   
        
        $post = Post::create([

            'title' => $request->title,
           'image' => $image,
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

        $red = Post::findOrFail($id); // récupère le modèle en fonction de l'ID, ou renvoie une erreur 404 si non trouvé
        return view('blog.show', compact('red')); // renvoie la vue avec le modèle en tant que variable
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

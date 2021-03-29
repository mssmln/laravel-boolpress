<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts_data = Post::all();
        $data = [
            'posts' => $posts_data
        ];

        return view('admin.post.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        // dd($tags);
        $data = [
            'tags' => $tags
        ];
        return view('admin.post.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $authUser = Auth::id();
        $newPost = new Post();
        $newPost->user_id = $authUser;
        $newPost->slug = Str::slug($data['title']);
        $newPost->fill($data);
        $data['cover'] = Storage::put('post_covers',$data['image']); //post_covers è la cartella che verrà creata nella root di storage , image si riferisce all'attributo name="image" nel tag html input con attributo type="file" per upload
        $newPost->cover = $data['cover']; // se inserisci cover nelle fillable questa riga non serve 
        $newPost->save();
        if(array_key_exists('tags',$data)){
            $newPost->tags()->sync($data['tags']);
        }
        return redirect()->route('post.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $data = [
            'posts' => $post
        ];
        return view('admin.post.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();
        if ($post){ 
            $data = [
                'posts' => $post,
                'tag' => $tags
            ];
            return view('admin.post.edit',$data); 
        }
        abort('404'); 
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
        $data = $request->all();
        // controllo if per update slug solo se cambia il title
        if($data['title'] != $post->title){
            $data['slug'] = Str::slug($data['title']);
        }

        // controllo if per evitare l'errore del undefined index image
        if(array_key_exists('image',$data)){
            $cover_path = Storage::put('post_covers',$data['image']); 
            $data['cover'] = $cover_path;
            // dd($data['cover']);
        }
        
        $post->update($data);
        if(array_key_exists('tags',$data)){
            $post->tags()->sync($data['tags']);
        }

        return redirect()->route('post.index',$post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->tags()->sync([]); //dobbiamo eliminare tutti i tag associati al post prima di poter eliminare il post, se lo facciamo dopo la delete non trova le chiavi primarie, gli diciamo di fare il sync con l'insieme vuoto 
        $post->delete();
        return redirect()->route('post.index');
    }
}

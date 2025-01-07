<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class PostsController extends Controller
{
    //hello llahcen lahcen   lahcen what hallo every bidy lahcen ziyate we need to lahcen ziyate                    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts=Post::all();
        
        $posts=Post::with('user')->latest()->get();//or Post::orderBy('created_at','desc')->get()// 
        // $posts=Post::latest()-->paginate(2);  to make two posts in page, in index blade add links
        return view('postes.index',["posts" => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users=User::all();
        return view('postes.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|string",
            "description"=>"required|string",
            "user_id"=>"required|exists:users,id" , //Using exists rule to check if user exists in the users table
            "img_path"=>"required,file,mimes:jpg,png,jpeg,max:3000" //3000 ko
        ]);
        $check_exist=Post::where('title',$request->title)->first();
        $path=null;
        if(!$check_exist && request()->hasFile('image')){
            $path=Storage::disk('public')->put('posts_images',request()->image);
            Post::create([ 
                "title"=>$request->title,
                "description"=>$request->description,
                "user_id"=>$request->user_id,
                "img_path"=>$path
            ]);
            return to_route('postes.index')->with('success','the post are created succussfuly (^_^)');
        }
        return to_route('postes.index')->with('success','the post are already existe !!!');
    }

    /*
     * Display the specified resource.
     */
    public function show(string $id)              
    {
        $post=Post::find($id);
        return view('postes.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post=Post::find($id);
        return view('postes.edit',['post'=>$post,'id'=>$id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $post = Post::find($id);
        $request->validate([
            "title" => "required|string",
            "description"=>"required|string",
            "img_path"=>"nullable|image|mimes:jpg,jpeg,png"
        ]);
        $path=null;
        if ($request->hasFile('image')) {
            Storage::disk('storage/posts_images')->delete($post->img_path);
            $path = Storage::disk('storage/posts_images')->put('posts_images', $request->file('image'));
            $post->update([
                "title"=>$request->title,
                "description"=>$request->description,
                "img_path"=>$path
            ]);
            return to_route('postes.show',$id)->with('success','the post are updated succussfuly (^_^)');
        }
        
        return redirect()->route('postes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy($id)
    // {
    //     $post = Post::find($id);
    //     $post->delete();
    //     return redirect()->route('postes.index');
    // }
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('postes.index');
    }
}





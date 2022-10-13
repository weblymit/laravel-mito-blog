<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Images;
use App\Models\ListOfCategory;

class PostController extends Controller
{

  public function __construct()
  {
    $this->middleware(['auth'])->except(['index', 'show',]);
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // 1- Retrieve all post from models Post and saved in variable
    $posts = Post::orderBy('updated_at', 'desc')->paginate(4);
    // dd($posts);
    // 2- Send data to view
    return view('pages.home', compact('posts'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $categories = ListOfCategory::all();
    return view('pages.create', compact('categories'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StorePostRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StorePostRequest $request)
  {
    // dd($request->all());
    // dd($request->file('images'));
    $request->validate([
      'title' => 'required|min:5|string|max:180|unique:posts,title',
      'content' => 'required|min:20|max:2000|string',
      'url_img' => 'required|image|mimes:png,jpg,jpeg|max:2000',
      'category' => 'required'
    ]);

    $validateImg = $request->file('url_img')->store('posts');

    $new_post = Post::create([
      'title' => $request->title,
      'content' => $request->content,
      'url_img' => $validateImg,
      'created_at' => now()
    ]);

    // 1-Verify if User select image or not
    if ($request->has('images')) {
      // 2-stock all images selected in array
      $imagesSelected = $request->file('images');
      // 3- loop storage each image
      foreach ($imagesSelected as $image) {
        // give a new name for each image
        $image_name = md5(rand(1000, 10000)) . '.' . strtolower($image->extension());
        // set the pathname
        $path_upload = 'images/';
        $image->move(public_path($path_upload), $image_name);

        Images::create([
          "slug" => $path_upload . $image_name, // posts/images/shhjhjshshshsjh.png
          "created_at" => now(),
          "post_id" => $new_post->id
        ]);
      }
    }

    Category::create([
      'name' => $request->category,
      'post_id' => $new_post->id,
      'created_at' => now()
    ]);

    return redirect()
      ->route('home')
      ->with('status', 'Le post a bien été ajouté');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Post  $post
   * @return \Illuminate\Http\Response
   */
  public function show(Post $post)
  {
    dd($post);
    return view('pages.show', compact('post'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Post  $post
   * @return \Illuminate\Http\Response
   */
  public function edit(Post $post)
  {
    // dd($post);
    return view('pages.edit', compact('post'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdatePostRequest  $request
   * @param  \App\Models\Post  $post
   * @return \Illuminate\Http\Response
   */
  public function update(UpdatePostRequest $request, Post $post)
  {
    // verify is_published
    $published = 0;
    if ($request->has('is_published')) {
      $published = 1;
    }

    // verify if file exist
    // if file exist delete previous img
    if ($request->hasFile('url_img')) {
      // delete previous image
      Storage::delete($post->url_img);
      // store the new image
      $post->url_img = $request->file('url_img')->store('posts');
    }

    // 1-Verify if User select image or not
    if ($request->has('images')) {
      // 2-stock all images selected in array
      $imagesSelected = $request->file('images');
      // 3- loop storage each image
      foreach ($imagesSelected as $image) {
        // give a new name for each image
        $image_name = md5(rand(1000, 10000)) . '.' . strtolower($image->extension());
        // set the pathname
        $path_upload = 'images/';
        $image->move(public_path($path_upload), $image_name);

        Images::create([
          "slug" => $path_upload . $image_name, // posts/images/shhjhjshshshsjh.png
          "created_at" => now(),
          "post_id" => $post->id
        ]);
      }
    }

    $request->validate([
      'title' => 'required|min:5|string|max:180',
      'content' => 'required|min:20|max:2000|string',
      'url_img' => 'required|sometimes'
    ]);

    $post->update([
      'title' => $request->title,
      'content' => $request->content,
      'url_img' => $post->url_img,
      'is_published' => $published,
      'updated_at' => now()
    ]);

    return redirect()
      ->route('home')
      ->with('status', 'Le post a bien été modifié!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Post  $post
   * @return \Illuminate\Http\Response
   */
  public function destroy(Post $post)
  {
    $post->delete();
    return redirect()
      ->route('home')
      ->with('status', "L'article a bien été supprimé");
  }

  public function allPosts()
  {
    $posts = Post::orderBy('updated_at', 'DESC')->paginate(5);
    return view('pages.all-posts', compact('posts'));
  }

  public function removeImage($id)
  {
    // 1- find the good image with the good id
    $image = Images::find($id);

    // 2- Verify image exist
    if (!$image) {
      abort(404);
    }

    // 3- delete image in actually folder
    unlink(public_path($image->slug)); // public/images/img/jdkhdbhkdjbhdhdbhjdbdhjhbd.jpg
    //  4- delete image from DB
    $image->delete();

    // 5- redirect to the post
    return back()->with('status', "l'image a bien été supprimé");
  }
}

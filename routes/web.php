<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $document = YamlFrontMatter::parseFile(resource_path('posts/my-first-post.html'));
    ///return view('welcome');
    ddd($document->matter());
});

Route::get('/posts', function () {
    return view('posts', [
        'posts' => Post::all()
    ]);
});

Route::get('/posts/{post}', function ($slug) {
// Find a post by its slug and pass it to a view called post 

    $post = Post::find($slug);

    return view('post', [
        'post' => $post
    ]); 

})->where('post', '[A-z_\-]+');
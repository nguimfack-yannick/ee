<?php
namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('comments')->get(); // Récupère tous les posts avec leurs commentaires
        return view('santos', compact('posts')); // Passe $posts à la vue santos.blade.php
    }

    public function like(Post $post)
    {
        $post->increment('likes_count');
        return response()->json(['likes_count' => $post->likes_count]);
    }

    public function heart(Post $post)
    {
        $post->increment('hearts_count');
        return response()->json(['hearts_count' => $post->hearts_count]);
    }

    public function comment(Request $request, Post $post)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $comment = Comment::create([
            'post_id' => $post->id,
            'name' => $request->name,
            'content' => $request->content,
        ]);

        return response()->json([
            'name' => $comment->name,
            'content' => $comment->content,
            'created_at' => $comment->created_at->diffForHumans(),
        ]);
    }
}
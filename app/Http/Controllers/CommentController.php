<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $name, $id)
    {
        $request->validate([
            'commentor' => 'required|string',
            'comment' => 'required|string',
        ]);

        $storeComment = new Comment([
            'commentor' => $request->commentor,
            'comment' => $request->comment,
            'movie_id' => $id,
            'movie_name' => $name,
        ]);

        $storeComment->save();

        return redirect()->route('media.show', ['name' => $name])->with('success', 'Comment added successfully');
    }
}

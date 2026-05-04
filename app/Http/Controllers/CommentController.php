<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function storeProject(Request $request, Project $project)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $comment = [
            'user_id' => Auth::id(),
            'content' => $request->content,
        ];

        $project->comments()->create($comment);

        return back()->with('success', __('Comment added successfully.'));
    }

    public function storeTask(Request $request, Project $project, Task $task)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $comment = [
            'user_id' => Auth::id(),
            'content' => $request->content,
        ];

        $task->comments()->create($comment);

        return back()->with('success', __('Comment added successfully.'));
    }

    public function destroy(Comment $comment)
    {
        if (Auth::id() !== $comment->user_id && !Auth::user()->role === 'admin') {
            abort(403, __('You are not authorized to delete this comment.'));
        }

        $comment->delete();

        return back()->with('success', __('Comment deleted successfully.'));
    }
}

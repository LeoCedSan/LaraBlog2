<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chirp;
use App\Models\Comment; // Importa el modelo Comment
use Illuminate\Http\RedirectResponse;

class CommentController extends Controller
{
    public function showCommentForm($chirpId)
    {
        $chirp = Chirp::findOrFail($chirpId);
        return view('comments.create', compact('chirp'));
    }

    public function store(Request $request, $chirpId)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $chirp = Chirp::findOrFail($chirpId);
        $chirp->comments()->create([
            'user_id' => auth()->user()->id,
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Comentario agregado correctamente');
    }

    public function edit(Comment $comment)
    {
        // Retorna la vista para editar el comentario
        return view('comments.edit', compact('comment'));
    }

    public function destroy(Comment $comment): RedirectResponse
    {
        // Implementa la lógica para eliminar el comentario
        $comment->delete();
        return back()->with('success', 'Comentario eliminado correctamente');
    }
    public function update(Request $request, Comment $comment): RedirectResponse
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);
    
        $comment->update([
            'content' => $request->content,
        ]);
    
        return redirect()->route('chirps')->with('success', 'Comentario actualizado correctamente');
    }
}

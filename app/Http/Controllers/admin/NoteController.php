<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::latest()->paginate(20);
        return view("admin.note.index", compact("notes"));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        // Create a new Note
        $note = Note::create([
            'title' => $request->title,
            'content' => $request->content,
            'category' => $request->category,
            'is_active' => $request->has('is_active') ? $request->is_active : true,
            'user_id' => auth()->id(), // Associate with current user
        ]);

        return redirect()->route('notes.index')->with('success', 'Note created successfully');
    }

    public function destroy(Note $note)
    {
        $note->delete();

        return redirect()->route('notes.index')->with('success', 'Note deleted successfully');
    }

    public function update(Request $request, Note $note)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        // Update the Note
        $note->update([
            'title' => $request->title,
            'content' => $request->content,
            'category' => $request->category,
            'is_active' => $request->has('is_active') ? $request->is_active : $note->is_active,
        ]);

        return redirect()->route('notes.index')->with('success', 'Note updated successfully');
    }

    public function view($id)
    {
        $note = Note::find($id);
        return view('admin.note.print', compact('note'));
    }
}

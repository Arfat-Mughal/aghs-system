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
    public function index(){
        $notes = Note::all();
        return view("admin.note.index",compact("notes"));
    }

    public function store(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
    
            // Handle file upload if an image is provided
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images', 'public');
            }
    
            // Create a new Note
            $note = Note::create([
                'name' => $request->name,
                'description' => $request->description,
                'path' => $imagePath,
            ]);
    
            // Redirect with success message
            return redirect()->route('notes.index')->with('success', 'Note created successfully');
        } catch (ValidationException $e) {
            // Redirect back with validation errors
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
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
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Adjust based on your needs
    ]);

    // Handle file upload if a new image is provided
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
        // Delete the old image if it exists
        if ($note->path) {
            Storage::disk('public')->delete($note->path);
        }
        // Update the image path
        $note->path = $imagePath;
    }

    // Update the Note
    $note->update([
        'name' => $request->name,
        'description' => $request->description,
    ]);

    // Redirect or respond as needed
    return redirect()->route('notes.index')->with('success', 'Note updated successfully');
}

public function view($id){
    $note = Note::find($id);
    return view('admin.note.print', compact('note'));
}

}

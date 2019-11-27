<?php


namespace App\Http\Controllers;


use App\Note;
use App\NoteAdapter;

class HomepageController extends Controller
{
    public function index()
    {
        $notes = Note::select('id', 'text')
            ->orderBy('created_at')
            ->get();
        $noteAdapter = NoteAdapter::getInstance($notes);
        return view('homepage.index')
            ->with('noteAdapter', $noteAdapter);
    }
}
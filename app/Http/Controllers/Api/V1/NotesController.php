<?php

namespace App\Http\Controllers\Api\V1;

use App\Note;
use App\NoteAdapter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class NotesController extends Controller
{
    public function index()
    {
        $notes = Note::select('id', 'text')
            ->orderBy('created_at')
            ->get();
        $json = NoteAdapter::getInstance($notes)
            ->getJson();
        return response($json,
            Response::HTTP_OK,
            ['Content-Type' => 'application/json']
        );
    }

    public function add(Request $request)
    {
        $note = new Note();
        $note->text = $request->input('text');
        $note->save();
        return response('', Response::HTTP_OK);
    }

    public function delete($id)
    {
        $note = Note::find($id);
        $note->delete();
        return response('', Response::HTTP_OK);
    }

}

<?php


namespace App;


use Illuminate\Database\Eloquent\Collection;

class NoteAdapter
{
    var $notesExt;

    public function __construct(Collection $notes)
    {
        $this->notesExt = $notes->map(function ($note) {
            $noteWithRoute = $note;
            $noteWithRoute->deleteRoute = route('api.notes.delete', $noteWithRoute->id);
            return $noteWithRoute;
        });
    }

    static function getInstance(Collection $notes)
    {
        return new static($notes);
    }

    public function getJson()
    {
        return $this->notesExt->toJson();
    }

}
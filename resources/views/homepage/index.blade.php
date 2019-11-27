<!doctype html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>Заметки</title>
</head>
<body>


<div class="container">
    <h1>Заметки</h1>
    <div id="note-app">
        <note-form api-url="{!! route('api.notes.add') !!}" v-on:change-note-list></note-form>
        {{-- JSON передаётся через v-bind для интерпретации --}}
        <note-index api-url="{!! route('api.notes.index') !!}"
                    v-bind:notes-default="{{ $noteAdapter->getJson() }}" v-on:change-note-list></note-index>
    </div>
</div>


<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/common.js') }}"></script>
</body>
</html>
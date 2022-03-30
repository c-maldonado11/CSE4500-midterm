<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hardware;
use App\Models\Note;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Forms\NoteForm;


class NoteController extends Controller
{

    public function index()
    {
        $note = Note::all();
        return view('note.list', compact('note'));
    }

    public function create(FormBuilder $formBuilder, Request $request)
    {
        $form = $formBuilder->create(NoteForm::class, [
            'method' => 'POST',
            'url' => route('note.store')
        ]);

        $hardware = $request->get('hardware', -1);
        $form->modify('hardware_id', "number", [
            'default_value' => $hardware,
        ]);
        return view('note.create', compact('form'));
    }

    public function store(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(NoteForm::class);
        $form->redirectIfNotValid();
        $note = Note::create($form->getFieldValues());
        return redirect("hardware/" . $note->hardware->id);
    }

    public function show($id)
    {
        $note = Note::find($id);
        return view('note.detail', compact('note'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $note = Note::find($id);
        $returnId = $note->hardware->id;
        Note::destroy($id);
        return redirect('/hardware/' . $returnId);
    }
}
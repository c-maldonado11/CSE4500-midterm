<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hardware;
use App\Models\Note;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Forms\HardwareForm;


class HardwareController extends Controller
{

    public function index()
    {
        $hardware = Hardware::all();
        return view('hardware.list', compact('hardware'));
    }

    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(HardwareForm::class, [
            'method' => 'POST',
            'url' => route('hardware.store')
        ]);
        return view('hardware.create', compact('form'));
    }

    public function store(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(HardwareForm::class);
        $form->redirectIfNotValid();
        Hardware::create($form->getFieldValues());
        return $this->index();
    }

    public function show($id)
    {
        $hardware = Hardware::find($id);
        return view('hardware.detail', compact('hardware'));
    }

    public function edit($id, FormBuilder $formBuilder)
    {
        $hardware = Hardware::find($id);

        $form = $formBuilder->create(HardwareForm::class, [
            'method' => 'PUT',
            'url' => route('hardware.update', ['hardware'=>$hardware->id]),
            'model' => $hardware,
        ]);
        return view('hardware.create', compact('form'));
    }

    public function update(Request $request, $id, FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(HardwareForm::class);
        $form->redirectIfNotValid();

        $hardware = Hardware::find($id);
        $hardware->update($form->getFieldValues());

        return redirect('/hardware/' . $id);
    }

    public function destroy($id)
    {
        Hardware::destroy($id);
        return redirect('/hardware');
    }
}
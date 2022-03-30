<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hardware;
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
            // Lazy Loading
            $hardware->invoices;
            return view('hardware.detail', compact('hardware'));
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
        Hardware::destroy($id);
        return redirect('/hardware');
    }
}
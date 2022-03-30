<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manufacturer;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Forms\ManufacturerForm;

class ManufacturerController extends Controller
{

    public function index()
    {
        $manufacturer = Manufacturer::all();
        return view('manufacturer.list', compact('manufacturer'));
    }

    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(ManufacturerForm::class, [
            'method' => 'POST',
            'url' => route('manufacturer.store')
        ]);
        return view('manufacturer.create', compact('form'));
    }

    public function store(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(ManufacturerForm::class);
        $form->redirectIfNotValid();
        Manufacturer::create($form->getFieldValues());
        return $this->index();
    }

    public function show($id)
    {
        $manufacturer = Manufacturer::find($id);
        // Lazy Loading
        $manufacturer->invoices;
        return view('manufacturer.detail', compact('manufacturer'));
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
        Manufacturer::destroy($id);
        return redirect('/manufacturer');
    }
}
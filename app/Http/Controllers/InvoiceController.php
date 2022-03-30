<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Forms\InvoiceForm;

class InvoiceController extends Controller
{

    public function index()
    {
        $invoice = Invoice::all();
        return view('invoice.list', compact('invoice'));
    }

    public function create(FormBuilder $formBuilder, Request $request)
    {
        $form = $formBuilder->create(InvoiceForm::class, [
            'method' => 'POST',
            'url' => route('invoice.store'),
        ]);
        $user = $request->get('user', 0);
        $form->modify('customer_id', "select", [
            'default_value' => $user,
        ]);
        
        return view('invoice.create', compact('form'));
    }

    public function store(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(InvoiceForm::class);
        $form->redirectIfNotValid();
        $invoice = Invoice::create($form->getFieldValues());
        $invoice->hardware()->attach(1);
        return $this->index();
    }

    public function show($id)
    {
        $invoice = Invoice::find($id);
        // Lazy Loading
        $invoice->customer;
        $invoice->hardware;
        return view('invoice.detail', compact('invoice'));
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
        Invoice::destroy($id);
        return redirect('/invoice');
    }
}
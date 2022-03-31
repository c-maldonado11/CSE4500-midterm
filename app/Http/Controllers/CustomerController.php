<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Invoice;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Forms\CustomerForm;

class CustomerController extends Controller
{
  
    public function index()
    {
        $customers = Customer::all();
        return view('customer.list', compact('customers'));

    }

    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(CustomerForm::class, [
            'method' => 'POST',
            'url' => route('customer.store')
        ]);
        return view('customer.create', compact('form'));
    }

    public function store(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(CustomerForm::class);
        $form->redirectIfNotValid();
        Customer::create($form->getFieldValues());
        return $this->index();
    }

    public function show($id)
    {
        $customer = Customer::find($id);
        $invoice = Invoice::find($id);
        // Lazy Loading
        $customer->invoices;
        
        return view('customer.detail', compact('customer','invoice'));
    }

    public function edit($id, FormBuilder $formBuilder)
    {
        $customer = Customer::find($id);

        $form = $formBuilder->create(CustomerForm::class, [
            'method' => 'PUT',
            'url' => route('customer.update', ['customer'=>$customer->id]),
            'model' => $customer,
        ]);
        return view('customer.create', compact('form'));
    }

    public function update(Request $request, $id, FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(CustomerForm::class);
        $form->redirectIfNotValid();

        $customer = Customer::find($id);
        $customer->update($form->getFieldValues());

        return redirect('/customer/' . $id);
    }

    public function destroy($id)
    {
        Customer::destroy($id);
        return redirect('/customer');
    }
}
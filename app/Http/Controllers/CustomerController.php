<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
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
        // Lazy Loading
        $customer->invoices;
        return view('customer.detail', compact('customer'));
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
        Customer::destroy($id);
        return redirect('/customer');
    }
}
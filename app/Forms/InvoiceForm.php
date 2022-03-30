<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;

use App\Models\Customer;


function getCustomers() {
    $retVal = array();
    $customers = Customer::where('id' ,'>' ,0)->get();
    foreach($customers as $customer) {
        $retVal[strval($customer["id"])] = strval($customer["fullname"]);
    }
    return $retVal;
}

class InvoiceForm extends Form
{
    public function buildForm()
    {
        $this->add('purchase_date', Field::DATE, [
                'rules' => 'required',
                'label' => 'Purchase Date'
            ])
            ->add('customer_id', Field::SELECT, [
                'rules' => 'required',
                'label' => 'User ID',
                'choices' => getCustomers(),
                'empty_value' => '=== Select User ==='
            ])
            ->add('submit', 'submit',[
                'label' => 'Submit'
            ]);
    }
}
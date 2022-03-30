<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;


class NoteForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('hardware_id', Field::NUMBER, [
                'rules' => 'required',
                'label' => 'Hardware ID',
                'attr' => ['readonly' => 'true'],
            ])
            ->add('service', Field::TEXT, [
                'rules' => 'required',
                'label' => 'Service'
            ])
            ->add('software', Field::TEXT, [
                'rules' => 'required',
                'label' => 'Software'
            ])
            ->add('content', Field::TEXT, [
                'rules' => 'required',
                'label' => 'Content'
            ])
            ->add('submit', 'submit',[
                'label' => 'Submit'
            ]);
    }
}
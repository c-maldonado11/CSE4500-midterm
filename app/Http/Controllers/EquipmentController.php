<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;

class TodoController extends Controller
{

    public function index()
    {
        $equipmentadd = Equipment::all();
        return view('equipmentadd',compact('equipmentadd'));

    }


    public function create()
    {
        return view('equipment.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'progress' => 'required',
       ]);

       $equipment = Equipment::create([ 
            'title' => $request->title, 
            'progress' => $request->progress, 
       ]);

       return $this->index();
    }


    public function show($id)
    {
        $equipment= Equipment::find($id); 
        return view('equipmentadd.show',compact('equipment'));
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
        //
    }
}

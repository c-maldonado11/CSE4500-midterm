<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hardware;

class HardwareController extends Controller
{

    public function index()
    {
        $hardware = Hardware::all();
        return view('hardware',compact('hardware'));

    }


    public function create()
    {
        return view('hardware.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'model' => 'required',
            'manufacturer' => 'required',
            'category' => 'required',
            'note' => 'required'
       ]);

       $hardware = Hardware::create([ 
            'model' => $request->model,
            'manufacturer' => $request->manufacturer,
            'category' => $request->category,
            'note' => $request->note
       ]);

       return $this->index();
    }


    public function show($id)
    {
        $hardware= Hardware::find($id); 
        return view('hardware.show',compact('hardware'));
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

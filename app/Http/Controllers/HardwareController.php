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
        $hardware= Hardware::find($id); 
        return view('hardware.edit',compact('hardware'));
    }


    public function update(Request $request, $id)
    {
        $hardware= Hardware::find($id);
        $hardware->model = $request->input('model');
        $hardware->manufacturer = $request->input('manufacturer');
        $hardware->category = $request->input('category');
        $hardware->note = $request->input('note');
        $hardware->update();
        return redirect('/hardware')->with('status',"Update Successful");
    }


    public function destroy($id)
    {
        {
            $hardware = Hardware::find($id);
            $hardware->delete();
            return redirect('/hardware')->with('status',"Data Deleted Successfuly");
       }
    }
}

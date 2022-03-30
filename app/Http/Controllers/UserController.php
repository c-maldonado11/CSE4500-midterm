<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        $user = User::all();
        return view('user',compact('user'));

    }


    public function create()
    {
        return view('user.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'contact_info' => 'required'
       ]);

       $user = User::create([ 
            'fname' => $request->fname,
            'lname' => $request->lname,
            'contact_info' => $request->contact_info,
       ]);

       return $this->index();
    }


    public function show($id)
    {
        $user= User::find($id); 
        return view('user.show',compact('user'));
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

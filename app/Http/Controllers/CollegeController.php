<?php

namespace App\Http\Controllers;

use App\Models\College;
use Illuminate\Http\Request;


class CollegeController extends Controller
{
    // show all colleges
    public function index()
    {
        $colleges = College::all(); //select all colleges from db

        return view('colleges.index', compact('colleges'));
    }

    public function create()
    {
        //create a new college
        $college = new College();

        return view('colleges.create', compact('college'));
    }

    //store the data inputted by the user
    public function store(Request $request)
    {
        //check that name is unique and that fields are not empty
        $request->validate([
            'name' => 'required|unique:colleges',
            'address' => 'required'
        ]);

        College::create($request->all());
        return redirect()->route('colleges.index')->with('success', 'College created successfully.');
    }

    //show a specific college
    public function show($id)
    {
        //find the college that corrolates with the 
        $college = College::find($id);
        return view('colleges.show', compact('college'));
    }

    //display edit form
    public function edit($id)
    {
        $college = College::find($id);
        return view('colleges.edit', compact('college'));
    }

    //update the college
    public function update(Request $request, $id)
    {
        //check that name is unique and that fields are not empty
        $request->validate([
            'name' => 'required|unique:colleges',
            'address' => 'required'
        ]);

        $college = College::find($id);
        $college->update($request->all());
        return redirect()->route('colleges.index')->with('success', 'College updated successfully.');
    }

    //delete the college
    public function destroy($id)
    {
        $college = College::find($id);
        $college->delete();
        return back()->with('success', 'College deleted successfully.');
    }

}

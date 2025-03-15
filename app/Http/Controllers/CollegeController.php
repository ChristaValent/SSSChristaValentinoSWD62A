<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class CollegeController extends Controller
{
    // show all colleges
    public function index()
    {
        

        return view('colleges.index');
    }

    public function create()
    {
        return view('colleges.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('colleges.index');
    }

    public function show($college)
    {
        return view('colleges.show');
    }

    public function edit($college)
    {
        return view('colleges.edit');
    }

    public function update(Request $request, $college)
    {
        return redirect()->route('colleges.show', $college);
    }
}

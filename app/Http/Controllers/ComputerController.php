<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use Illuminate\Http\Request;

class ComputerController extends Controller
{
    public function create()
    {
        $computers = Computer::all();

        return view('Computer.create', compact('computers'));
    }

    public function store(Request $request)
    {
        $computer = Computer::create($request->all());

        return redirect()->route('computers.create')->with('record', $computer->toJson(JSON_PRETTY_PRINT));
    }
}
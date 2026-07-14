<?php

namespace App\Http\Controllers;

use App\Models\Apprentice;
use App\Models\Computer;
use App\Models\Course;
use Illuminate\Http\Request;

class ApprenticeController extends Controller
{
    public function create()
    {
        $courses = Course::all();
        $computers = Computer::all();
        $apprentices = Apprentice::all();

        return view('Apprentice.create', compact('courses', 'computers', 'apprentices'));
    }

    public function store(Request $request)
    {
        $apprentice = Apprentice::create($request->all());

        return redirect()->route('apprentices.create')->with('record', $apprentice->toJson(JSON_PRETTY_PRINT));
    }
}



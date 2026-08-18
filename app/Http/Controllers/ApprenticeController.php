<?php

namespace App\Http\Controllers;

use App\Models\Apprentice;
use App\Models\Course;
use App\Models\Computer;
use Illuminate\Http\Request;

class ApprenticeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        
        $query = Apprentice::with(['course', 'computer']);
        
        if (!empty($search)) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhereHas('course', function ($q) use ($search) {
                      $q->where('course_number', 'like', "%{$search}%");
                  });
        }
        
        $apprentices = $query->get();
        
        return view('Apprentice.index', compact('apprentices', 'search'));
    }

    public function show(Apprentice $apprentice)
    {
        $apprentice->load(['course', 'computer']);
        return view('Apprentice.show', compact('apprentice'));
    }

    public function create()
    {
        $courses = Course::with('area')->get();
        $computers = Computer::with('area')->get();
        return view('Apprentice.create', compact('courses', 'computers'));
    }

    public function store(Request $request)
    {
        Apprentice::create($request->all());
        return redirect()->route('apprentices.index')->with('success', 'Aprendiz creado correctamente');
    }

    public function edit(Apprentice $apprentice)
    {
        $courses = Course::with('area')->get();
        $computers = Computer::with('area')->get();
        return view('Apprentice.edit', compact('apprentice', 'courses', 'computers'));
    }

    public function update(Request $request, Apprentice $apprentice)
    {
        $apprentice->update($request->all());
        return redirect()->route('apprentices.show', $apprentice->id)->with('success', 'Aprendiz actualizado correctamente');
    }

    public function destroy(Apprentice $apprentice)
    {
        $apprentice->delete();
        return redirect()->route('apprentices.index')->with('success', 'Aprendiz eliminado correctamente');
    }
}
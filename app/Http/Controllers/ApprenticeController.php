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
                  ->orWhere('cell_number', 'like', "%{$search}%")
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
        $computers = Computer::all();
        return view('Apprentice.create', compact('courses', 'computers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'cell_number' => ['required', 'string', 'max:50'],
            'course_id' => ['required', 'string', 'max:100'],
            'computer_id' => ['nullable', 'string', 'max:100'],
        ]);

        Apprentice::create($validated);
        return redirect()->route('apprentices.index')->with('success', 'Aprendiz creado correctamente');
    }

    public function edit(Apprentice $apprentice)
    {
        $courses = Course::with('area')->get();
        $computers = Computer::all();
        return view('Apprentice.edit', compact('apprentice', 'courses', 'computers'));
    }

    public function update(Request $request, Apprentice $apprentice)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'cell_number' => ['required', 'string', 'max:50'],
            'course_id' => ['required', 'string', 'max:100'],
            'computer_id' => ['nullable', 'string', 'max:100'],
        ]);

        $apprentice->update($validated);
        return redirect()->route('apprentices.show', $apprentice->id)->with('success', 'Aprendiz actualizado correctamente');
    }

    public function destroy(Apprentice $apprentice)
    {
        $apprentice->delete();
        return redirect()->route('apprentices.index')->with('success', 'Aprendiz eliminado correctamente');
    }
}
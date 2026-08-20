<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Teacher;
use App\Models\Training_Center;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    // Listar todos los instructores (cargando relaciones si aplican)
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        
        $query = Teacher::with(['area', 'trainingCenter']);
        
        if (!empty($search)) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhereHas('area', function ($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%");
                  });
        }
        
        $teachers = $query->get();
        
        return view('Teacher.index', compact('teachers', 'search'));
    }

    // Ver detalles de un instructor (Carga ansiosa para mostrar nombres de Área/Centro)
    public function show(Teacher $teacher)
    {
        $teacher->load(['area', 'trainingCenter']);
        return view('Teacher.show', compact('teacher'));
    }

    // Mostrar formulario para crear instructor
    public function create()
    {
        $areas = Area::all();
        $training_centers = Training_Center::all();

        return view('Teacher.create', compact('areas', 'training_centers'));
    }

    // Guardar nuevo instructor
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'area_id' => ['required', 'string', 'max:100'],
            'training_center_id' => ['required', 'string', 'max:100'],
        ]);

        Teacher::create($validated);

        return redirect()->route('teachers.index')->with('success', 'Instructor creado correctamente');
    }

    // Mostrar formulario para editar instructor
    public function edit(Teacher $teacher)
    {
        $areas = Area::all();
        $training_centers = Training_Center::all();

        return view('Teacher.edit', compact('teacher', 'areas', 'training_centers'));
    }

    // Actualizar instructor
    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'area_id' => ['required', 'string', 'max:100'],
            'training_center_id' => ['required', 'string', 'max:100'],
        ]);

        $teacher->update($validated);

        return redirect()->route('teachers.show', $teacher->id)->with('success', 'Instructor actualizado correctamente');
    }

    // Eliminar instructor
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'Instructor eliminado correctamente');
    }
}
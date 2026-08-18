<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Course;
use App\Models\Training_Center;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Listar todos los cursos (con relaciones cargadas para la vista index)
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        
        $query = Course::with(['area', 'trainingCenter']);
        
        if (!empty($search)) {
            $query->where('course_number', 'like', "%{$search}%")
                  ->orWhere('day', 'like', "%{$search}%")
                  ->orWhereHas('area', function ($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%");
                  });
        }
        
        $courses = $query->get();
        
        return view('Course.index', compact('courses', 'search'));
    }

    // Ver detalles de un curso (Carga las relaciones para mostrar nombres en lugar de IDs)
    public function show(Course $course)
    {
        $course->load(['area', 'trainingCenter']);
        return view('Course.show', compact('course'));
    }

    // Mostrar formulario para crear curso
    public function create()
    {
        $areas = Area::all();
        $training_centers = Training_Center::all();

        return view('Course.create', compact('areas', 'training_centers'));
    }

    // Guardar nuevo curso
    public function store(Request $request)
    {
        Course::create($request->all());

        return redirect()->route('courses.index')->with('success', 'Curso creado correctamente');
    }

    // Mostrar formulario para editar curso
    public function edit(Course $course)
    {
        $areas = Area::all();
        $training_centers = Training_Center::all();

        return view('Course.edit', compact('course', 'areas', 'training_centers'));
    }

    // Actualizar curso
    public function update(Request $request, Course $course)
    {
        $course->update($request->all());

        return redirect()->route('courses.show', $course->id)->with('success', 'Curso actualizado correctamente');
    }

    // Eliminar curso
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Curso eliminado correctamente');
    }
}
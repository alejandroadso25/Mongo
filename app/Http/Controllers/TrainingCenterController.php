<?php

namespace App\Http\Controllers;

use App\Models\Training_Center;
use Illuminate\Http\Request;

class TrainingCenterController extends Controller
{
    // Listar todos los centros de capacitación
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        
        $query = Training_Center::query();
        
        if (!empty($search)) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
        }
        
        $training_centers = $query->get();
        
        return view('Training_Center.index', compact('training_centers', 'search'));
    }

    // Ver detalles de un centro de capacitación
    public function show(Training_Center $trainingCenter)
    {
        return view('Training_Center.show', compact('trainingCenter'));
    }

    // Mostrar formulario para crear centro de capacitación
    public function create()
    {
        $trainingCenters = Training_Center::all();

        return view('Training_Center.create', compact('trainingCenters'));
    }

    // Guardar nuevo centro de capacitación
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
        ]);

        Training_Center::create($validated);

        return redirect()->route('training-centers.index')->with('success', 'Centro de capacitación creado correctamente');
    }

    // Mostrar formulario para editar centro de capacitación
    public function edit(Training_Center $trainingCenter)
    {
        return view('Training_Center.edit', compact('trainingCenter'));
    }

    // Actualizar centro de capacitación
    public function update(Request $request, Training_Center $trainingCenter)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
        ]);

        $trainingCenter->update($validated);

        return redirect()->route('training-centers.show', $trainingCenter->id)->with('success', 'Centro de capacitación actualizado correctamente');
    }

    // Eliminar centro de capacitación
    public function destroy(Training_Center $trainingCenter)
    {
        $trainingCenter->delete();

        return redirect()->route('training-centers.index')->with('success', 'Centro de capacitación eliminado correctamente');
    }
}

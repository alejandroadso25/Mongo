<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    // Listar todas las áreas
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        
        $query = Area::query();
        
        if (!empty($search)) {
            $query->where('name', 'like', "%{$search}%");
        }
        
        $areas = $query->get();
        
        return view('Area.index', compact('areas', 'search'));
    }

    // Ver detalles de un área
    public function show(Area $area)
    {
        $area->load(['computers', 'teachers', 'courses']);
        return view('Area.show', compact('area'));
    }
    
    // Mostrar formulario para crear área
    public function create()
    {
        return view('Area.create');
    }

    // Guardar nueva área
    public function store(Request $request)
    {
        Area::create($request->all());
        return redirect()->route('areas.index')->with('success', 'Área creada correctamente');
    }

    // Mostrar formulario para editar área
    public function edit(Area $area)
    {
        return view('Area.edit', compact('area'));
    }

    // Actualizar área
    public function update(Request $request, Area $area)
    {
        $area->update($request->all());
        return redirect()->route('areas.show', $area->id)->with('success', 'Área actualizada correctamente');
    }

    // Eliminar área
    public function destroy(Area $area)
    {
        $area->delete();
        return redirect()->route('areas.index')->with('success', 'Área eliminada correctamente');
    }
}
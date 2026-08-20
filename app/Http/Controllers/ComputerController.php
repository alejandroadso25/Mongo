<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use Illuminate\Http\Request;

class ComputerController extends Controller
{
    // Listar todas las computadoras
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        
        $query = Computer::query();
        
        if (!empty($search)) {
            $query->where('brand', 'like', "%{$search}%")
                  ->orWhere('number', 'like', "%{$search}%");
        }
        
        $computers = $query->get();
        
        return view('Computer.index', compact('computers', 'search'));
    }

    // Ver detalles de una computadora
    public function show(Computer $computer)
    {
        return view('Computer.show', compact('computer'));
    }
    
    // Mostrar formulario para crear computadora
    public function create()
    {
        return view('Computer.create');
    }

    // Guardar nueva computadora
    public function store(Request $request)
    {
        $validated = $request->validate([
            'number' => ['required', 'string', 'max:255'],
            'brand' => ['required', 'string', 'max:255'],
        ]);

        Computer::create($validated);
        return redirect()->route('computers.index')->with('success', 'Computador creado correctamente');
    }

    // Mostrar formulario para editar computadora
    public function edit(Computer $computer)
    {
        return view('Computer.edit', compact('computer'));
    }

    // Actualizar computadora
    public function update(Request $request, Computer $computer)
    {
        $validated = $request->validate([
            'number' => ['required', 'string', 'max:255'],
            'brand' => ['required', 'string', 'max:255'],
        ]);

        $computer->update($validated);
        return redirect()->route('computers.show', $computer->id)->with('success', 'Computador actualizado correctamente');
    }

    // Eliminar computadora
    public function destroy(Computer $computer)
    {
        $computer->delete();
        return redirect()->route('computers.index')->with('success', 'Computador eliminado correctamente');
    }
}
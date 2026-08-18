<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\Area;
use Illuminate\Http\Request;

class ComputerController extends Controller
{
    // Listar todas las computadoras
    public function index()
    {
        $computers = Computer::with(['area'])->get();
        return view('Computer.index', compact('computers'));
    }

    // Ver detalles de una computadora
    public function show(Computer $computer)
    {
        $computer->load(['area']);
        return view('Computer.show', compact('computer'));
    }
    
    // Mostrar formulario para crear computadora
    public function create()
    {
        $areas = Area::all();
        return view('Computer.create', compact('areas'));
    }

    // Guardar nueva computadora
    public function store(Request $request)
    {
        Computer::create($request->all());
        return redirect()->route('computers.index')->with('success', 'Computador creado correctamente');
    }

    // Mostrar formulario para editar computadora
    public function edit(Computer $computer)
    {
        $areas = Area::all();
        return view('Computer.edit', compact('computer', 'areas'));
    }

    // Actualizar computadora
    public function update(Request $request, Computer $computer)
    {
        $computer->update($request->all());
        return redirect()->route('computers.show', $computer->id)->with('success', 'Computador actualizado correctamente');
    }

    // Eliminar computadora
    public function destroy(Computer $computer)
    {
        $computer->delete();
        return redirect()->route('computers.index')->with('success', 'Computador eliminado correctamente');
    }
}
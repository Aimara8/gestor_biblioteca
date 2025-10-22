<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Libro;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros = Libro::orderBy('titulo', 'desc')->paginate(10);
        return Inertia::render('Dashboard/Libros', [
            'libros' => $libros
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Forms/LibroForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de campos
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'editorial' => 'required|string|max:255',
            'fecha_publicacion' => 'required|date',
            'isbn' => 'required|string|max:20|unique:libros,isbn',
        ]);

        // Crear registro
        Libro::create($validated);

        // Redirigir con mensaje de éxito
        return redirect()->route('libros.index')
            ->with('success', 'Libro añadido correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $libro = Libro::findOrFail($id);

        return Inertia::render('Dashboard/LibroDetails', [
            'libro' => $libro
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $libro = Libro::findOrFail($id);

        return Inertia::render('Forms/LibroForm', [
            'libro' => $libro,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $libro = Libro::findOrFail($id);

        // Validación de campos
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'editorial' => 'required|string|max:255',
            'fecha_publicacion' => 'required|date',
            'isbn' => 'required|string|max:20|unique:libros,isbn,' . $libro->id,
        ]);

        // Actualizar registro
        $libro->update($validated);

        // Redirigir con mensaje de éxito
        return redirect()->route('libros.index')
            ->with('success', 'Libro actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $libro = Libro::findOrFail($id);
        $libro->delete();

        return redirect()->route('libros.index')->with('success', 'Libro eliminado correctamente.');
    }
}

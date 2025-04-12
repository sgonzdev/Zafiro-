<?php

namespace App\Http\Controllers;

use App\Models\Perfume;
use Illuminate\Http\Request;

class PerfumeController extends Controller
{
    public function indexPublic(Request $request)
    {
        $query = Perfume::query();

        // Filtrar por marca
        if ($request->has('brand') && $request->brand != 'All') {
            $query->where('brand', $request->brand);
        }

        $perfumes = $query->paginate(4);

        $brands = Perfume::select('brand')->distinct()->pluck('brand')->toArray();

        return view('welcome', compact('perfumes', 'brands'));
    }

    public function index(Request $request)
    {
        $query = Perfume::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('brand', 'like', "%{$search}%");
        }

        $perfumes = $query->paginate(10);
        return view('dashboard', compact('perfumes'));
    }
    // Mostrar formulario de creación
    public function create()
    {
        return view('dashboard.perfumes.create');
    }

    // Guardar un nuevo perfume
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'description' => 'nullable',
        ]);

        Perfume::create($request->all());

        return redirect()->route('dashboard')->with('success', 'Perfume creado exitosamente.');
    }

    // Mostrar formulario de edición
    public function edit(Perfume $perfume)
    {
        return view('dashboard.perfumes.edit', compact('perfume'));
    }

    // Actualizar un perfume existente
    public function update(Request $request, Perfume $perfume)
    {
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'description' => 'nullable',
        ]);

        $perfume->update($request->all());

        return redirect()->route('dashboard')->with('success', 'Perfume actualizado exitosamente.');
    }

    // Eliminar un perfume
    public function destroy(Perfume $perfume)
    {
        $perfume->delete();
        return redirect()->route('dashboard')->with('success', 'Perfume eliminado exitosamente.');
    }
}

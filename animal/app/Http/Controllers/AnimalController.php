<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of all animals.
     * GET /animals
     */
    public function index()
    {
        $animals = Animal::latest()->get();

        return view('animals.index', compact('animals'));
    }

    /**
     * Show the form for creating a new animal.
     * GET /animals/create
     */
    public function create()
    {
        return view('animals.create');
    }

    /**
     * Store a newly created animal in the database.
     * POST /animals
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:100',
            'species' => 'required|string|max:150',
            'age'     => 'required|integer|min:0|max:200',
            'habitat' => 'required|string|max:150',
        ]);

        Animal::create($request->only('name', 'species', 'age', 'habitat'));

        return redirect()->route('animals.index')
            ->with('success', 'Animal record created successfully.');
    }

    /**
     * Display the specified animal.
     * GET /animals/{id}
     */
    public function show($id)
    {
        $animal = Animal::find($id);

        if (!$animal) {
            return redirect()->route('animals.index')
                ->with('error', 'Animal not found.');
        }

        return view('animals.show', compact('animal'));
    }


    public function edit($id)
    {
        $animal = Animal::find($id);

        if (!$animal) {
            return redirect()->route('animals.index')
                ->with('error', 'Animal not found.');
        }

        return view('animals.edit', compact('animal'));
    }

    /**
     * Update the specified animal in the database.
     * PUT /animals/{id}
     */
    public function update(Request $request, Animal $animal)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'species' => 'required|string|max:150',
            'age' => 'required|integer|min:0|max:200',
            'habitat' => 'required|string|max:150',
        ]);
    
        $animal->update($validated);
    
     return redirect()->route('animals.index')
    ->with('success', 'Animal updated successfully!');

    }

    /**
     * Remove the specified animal from the database.
     * DELETE /animals/{id}
     */
    public function destroy($id)
    {
        $animal = Animal::find($id);

        if (!$animal) {
            return redirect()->route('animals.index')
                ->with('error', 'Animal not found.');
        }

        $animal->delete();

        return redirect()->route('animals.index')
            ->with('success', 'Animal record deleted successfully.');
    }
}
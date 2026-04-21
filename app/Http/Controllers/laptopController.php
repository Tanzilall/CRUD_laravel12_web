<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use Illuminate\Http\Request;

class LaptopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laptops = Laptop::latest()->paginate(10);
        return view('laptops.index', compact('laptops'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('laptops.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_laptop' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string'
        ]);

        Laptop::create($validated);

        return redirect()->route('laptops.index')
            ->with('success', 'Data laptop berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Laptop $laptop)
    {
        return view('laptops.show', compact('laptop'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laptop $laptop)
    {
        return view('laptops.edit', compact('laptop'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Laptop $laptop)
    {
        $validated = $request->validate([
            'nama_laptop' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string'
        ]);

        $laptop->update($validated);

        return redirect()->route('laptops.index')
            ->with('success', 'Data laptop berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laptop $laptop)
    {
        $laptop->delete();
        
        return redirect()->route('laptops.index')
            ->with('success', 'Data laptop berhasil dihapus');
    }
}
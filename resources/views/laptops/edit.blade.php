@extends('layouts.app')

@section('title', 'Edit Laptop')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Data Laptop</h1>

    <form action="{{ route('laptops.update', $laptop) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nama_laptop" class="block text-sm font-medium text-gray-700 mb-2">
                Nama Laptop <span class="text-red-500">*</span>
            </label>
            <input type="text" 
                   name="nama_laptop" 
                   id="nama_laptop"
                   value="{{ old('nama_laptop', $laptop->nama_laptop) }}" 
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('nama_laptop') border-red-500 @enderror"
                   required>
            @error('nama_laptop')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="harga" class="block text-sm font-medium text-gray-700 mb-2">
                Harga (Rp) <span class="text-red-500">*</span>
            </label>
            <input type="number" 
                   name="harga" 
                   id="harga"
                   value="{{ old('harga', $laptop->harga) }}" 
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('harga') border-red-500 @enderror"
                   required>
            @error('harga')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="stok" class="block text-sm font-medium text-gray-700 mb-2">
                Stok <span class="text-red-500">*</span>
            </label>
            <input type="number" 
                   name="stok" 
                   id="stok"
                   value="{{ old('stok', $laptop->stok) }}" 
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('stok') border-red-500 @enderror"
                   required>
            @error('stok')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">
                Deskripsi
            </label>
            <textarea name="deskripsi" 
                      id="deskripsi"
                      rows="4" 
                      class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('deskripsi') border-red-500 @enderror">{{ old('deskripsi', $laptop->deskripsi) }}</textarea>
            @error('deskripsi')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-3">
            <button type="submit" 
                    class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-6 rounded transition duration-300">
                Update
            </button>
            <a href="{{ route('laptops.index') }}" 
               class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-6 rounded transition duration-300">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
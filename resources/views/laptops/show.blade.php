@extends('layouts.app')

@section('title', 'Detail Laptop')

@section('content')
<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="p-6 border-b border-gray-200">
        <h1 class="text-2xl font-bold text-gray-800">Detail Laptop</h1>
    </div>

    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Laptop</label>
                <p class="text-lg font-semibold text-gray-900">{{ $laptop->nama_laptop }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Harga</label>
                <p class="text-lg font-semibold text-green-600">
                    Rp {{ number_format($laptop->harga, 0, ',', '.') }}
                </p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Stok</label>
                <p class="text-lg font-semibold">
                    <span class="px-3 py-1 rounded text-sm 
                        @if($laptop->stok > 10) bg-green-100 text-green-800
                        @elseif($laptop->stok > 0) bg-yellow-100 text-yellow-800
                        @else bg-red-100 text-red-800 @endif">
                        {{ $laptop->stok }} unit
                    </span>
                </p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Status Stok</label>
                <p class="text-lg">
                    @if($laptop->stok > 10)
                        <span class="text-green-600">Stok Tersedia</span>
                    @elseif($laptop->stok > 0)
                        <span class="text-yellow-600">Stok Menipis</span>
                    @else
                        <span class="text-red-600">Stok Habis</span>
                    @endif
                </p>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                <div class="bg-gray-50 rounded-lg p-4">
                    {{ $laptop->deskripsi ?: 'Tidak ada deskripsi' }}
                </div>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Informasi Tambahan</label>
                <div class="bg-gray-50 rounded-lg p-4">
                    <p><strong>ID:</strong> {{ $laptop->id }}</p>
                    <p><strong>Dibuat pada:</strong> {{ $laptop->created_at->format('d/m/Y H:i:s') }}</p>
                    <p><strong>Terakhir diupdate:</strong> {{ $laptop->updated_at->format('d/m/Y H:i:s') }}</p>
                </div>
            </div>
        </div>

        <div class="mt-6 flex gap-3">
            <a href="{{ route('laptops.edit', $laptop) }}" 
               class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-6 rounded transition duration-300">
                Edit Data
            </a>
            <a href="{{ route('laptops.index') }}" 
               class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-6 rounded transition duration-300">
                Kembali
            </a>
        </div>
    </div>
</div>
@endsection
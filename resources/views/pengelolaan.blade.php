@extends('layouts.app')

@section('title', 'Pengelolaan')

@section('slot')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-gray-100 py-8 px-4">
    <div class="max-w-6xl mx-auto">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-[#1E376A]">Pengelolaan Nostalgia</h1>
            <p class="text-gray-600">Kelola koleksi kenangan masa kecil</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-8">
            <div class="bg-white border border-[#1E376A] rounded-lg p-5 shadow-sm">
                <h2 class="text-lg font-semibold text-gray-700 mb-2">Total Koleksi</h2>
                <p class="text-3xl font-bold text-[#1E376A]">{{ $totalNostalgia }}</p>
            </div>
            
            <div class="bg-white border border-[#1E376A] rounded-lg p-5 shadow-sm flex flex-col">
                <h2 class="text-lg font-semibold text-gray-700 mb-2">Aksi</h2>
                <a href="{{ route('pengelolaan.create', ['username' => $username]) }}" class="mt-auto border border-[#1E376A] bg-[#1E376A] hover:bg-white text-white hover:text-[#1E376A] font-medium py-1 px-4 rounded-lg inline-block w-fit">
                    + Tambah Nostalgia
                </a>
            </div>
        </div>

        <div class="bg-white rounded-lg border border-[#1E376A] overflow-hidden shadow-sm">
            <div class="p-4 border-b border-[#1E376A]">
                <h2 class="text-xl font-semibold text-[#1E376A]">Daftar Nostalgia</h2>
            </div>
            
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Judul</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tahun</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kategori</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Deskripsi</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Link</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($nostalgias as $nostalgia)
                        <tr class="hover:bg-blue-50">
                            <td class="px-6 py-4 whitespace-nowrap lg:whitespace-normal text-sm font-medium text-gray-900">{{ $nostalgia['judul'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap lg:whitespace-normal text-sm text-gray-500">{{ $nostalgia['tahun'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap lg:whitespace-normal text-sm text-gray-500">{{ $nostalgia['kategori'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap lg:whitespace-normal text-sm text-gray-500">{{ $nostalgia['deskripsi'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap lg:whitespace-normal text-sm text-gray-500">{{ $nostalgia['link'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
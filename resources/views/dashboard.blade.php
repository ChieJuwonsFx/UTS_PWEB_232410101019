@extends('layouts.app')

@section('title', 'Dashboard')

@section('slot')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-gray-100 py-8 px-4">
    <div class="max-w-6xl mx-auto">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-[#1E376A]">Halo, {{ $username }}!</h1>
            <p class="text-gray-600 mt-1">Mari mengenang kenangan indah masa kecil kita</p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-2xl font-bold text-[#1E376A] mb-6">Nostalgia 2000an</h2>

            <div class="flex flex-wrap gap-2 mb-6">
                <a href="{{ route('dashboard', ['username' => $username, 'kategori' => 'Semua']) }}" 
                    class="px-3 py-1 {{ request('kategori') == 'Semua' ? 'bg-[#1E376A] text-white' : 'bg-white border border-[#1E376A] text-[#1E376A]' }} rounded-full text-sm">
                    Semua
                </a>
                <a href="{{ route('dashboard', ['username' => $username, 'kategori' => 'Kartun']) }}" 
                   class="px-3 py-1 {{ request('kategori') == 'Kartun' ? 'bg-[#1E376A] text-white' : 'bg-white border border-[#1E376A] text-[#1E376A]' }} rounded-full text-sm">
                    Kartun
                </a>
                <a href="{{ route('dashboard', ['username' => $username, 'kategori' => 'Permainan']) }}" 
                   class="px-3 py-1 {{ request('kategori') == 'Permainan' ? 'bg-[#1E376A] text-white' : 'bg-white border border-[#1E376A] text-[#1E376A]' }} rounded-full text-sm">
                    Permainan
                </a>
                <a href="{{ route('dashboard', ['username' => $username, 'kategori' => 'Lagu']) }}" 
                   class="px-3 py-1 {{ request('kategori') == 'Lagu' ? 'bg-[#1E376A] text-white' : 'bg-white border border-[#1E376A] text-[#1E376A]' }} rounded-full text-sm">
                    Lagu
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach ($nostalgia as $item)
                <div class="bg-white border border-[#1E376A] rounded-lg p-4 hover:shadow-md transition">
                    <div class="mb-3">
                        <h3 class="text-lg font-bold text-[#1E376A]">{{ $item['judul'] }}</h3>
                        <div class="flex items-center text-sm text-gray-500 mt-1">
                            <span>{{ $item['kategori'] }}</span>
                            <span class="mx-2">•</span>
                            <span>{{ $item['tahun'] }}</span>
                        </div>
                    </div>
                    
                    <p class="text-gray-600 text-sm mb-4">{{ Str::limit($item['deskripsi'], 100) }}</p>
                    
                    <a href="{{ $item['link'] }}" target="_blank" class="block w-full text-center border border-[#1E376A] bg-[#1E376A] hover:bg-white text-white hover:text-[#1E376A] font-medium py-1 rounded-lg transition">
                        Lihat
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
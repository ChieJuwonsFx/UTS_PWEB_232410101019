@extends('layouts.app')

@section('title', 'Profile')

@section('slot')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-gray-100 py-8 px-4 sm:px-6">
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-8">
            <h1 class="text-2xl sm:text-3xl font-bold text-[#1E376A]">Halo, {{ session('user.username') }}</h1>
            <p class="text-gray-600 mt-2">Ringkasan aktivitas nostalgia kamu</p>
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="bg-[#1E376A] px-6 py-4">
                <div class="flex items-center">
                    <div class="bg-white text-[#1E376A] rounded-full w-12 h-12 flex items-center justify-center mr-4 font-medium">
                        {{ substr(session('user.username'), 0, 3) }}
                    </div>
                    <div>
                        <h2 class="text-lg font-semibold text-white">{{ session('user.username') }}</h2>
                        <p class="text-blue-100 text-sm">Terakhir login {{ \Carbon\Carbon::parse(session('user.lastLogin'))->diffForHumans() }}</p>
                    </div>
                </div>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div class="border border-gray-200 p-4 rounded-lg">
                        <h3 class="text-gray-600 mb-1">Total Koleksi</h3>
                        <p class="text-xl font-semibold text-[#1E376A]">{{ count($nostalgia) }}</p>
                    </div>
                    
                    <div class="border border-gray-200 p-4 rounded-lg">
                        <h3 class="text-gray-600 mb-1">Kategori Favorit</h3>
                        <p class="text-xl font-semibold text-[#1E376A]">{{ $kategoriFavorit }}</p>
                    </div>

                    <div class="border border-gray-200 p-4 rounded-lg">
                        <h3 class="text-gray-600 mb-1">Nostalgia Pertama</h3>
                        <p class="text-[#1E376A]">"{{ $pertama['judul'] }}" <span class="text-gray-500 text-sm">({{ $pertama['tahun'] }})</span></p>
                    </div>
                    
                    <div class="border border-gray-200 p-4 rounded-lg">
                        <h3 class="text-gray-600 mb-1">Level Nostalgia</h3>
                        <p class="text-[#1E376A]">{{ $levelNostalgia }} <span class="text-gray-500 text-sm">{{ $levelDesc }}</span></p>
                    </div>
                </div>

                <div class="bg-blue-50 rounded-lg p-4 mb-6">
                    <h3 class="text-sm font-medium text-[#1E376A] mb-1">Fakta Menarik</h3>
                    <p class="text-gray-700 text-sm italic">"{{ $faktaRandom }}"</p>
                </div>

                <div class="text-center">
                    <a href="{{ route('logout') }}" class="inline-block border border-[#1E376A] bg-[#1E376A] hover:bg-white text-white hover:text-[#1E376A] px-6 py-2 rounded-lg text-sm transition">
                        Keluar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('title', 'Tambah Nostalgia')

@section('slot')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-gray-100 py-8 px-4">
    <div class="max-w-2xl mx-auto">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-[#1E376A]">Tambah Nostalgia Baru</h1>
            <p class="text-gray-600 mt-2">Isi form berikut untuk menambah koleksi nostalgiamu</p>
        </div>

        <div class="bg-white rounded-xl border border-[#1E376A] shadow-sm p-6 md:p-8">
            <form action="{{ route('pengelolaan.store') }}" method="POST">
                @csrf
                
                <div class="mb-5">
                    <label for="judul" class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
                    <input type="text" id="judul" name="judul" class="w-full px-4 py-2 border border-gray-300 rounded-lg transition duration-200 
                    @error('username') border-red-500 @enderror" value="{{ old('judul') }}" placeholder="Masukkan judul nostalgia">
                    @error('judul')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="kategori" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                    <select id="kategori" name="kategori" class="w-full px-4 py-2 border border-gray-300 rounded-lg transition duration-200 
                    @error('username') border-red-500 @enderror">
                        <option value="">Pilih Kategori</option>
                        <option value="Kartun" {{ old('kategori') == 'Kartun' ? 'selected' : '' }}>Kartun</option>
                        <option value="Permainan" {{ old('kategori') == 'Permainan' ? 'selected' : '' }}>Permainan</option>
                        <option value="Lagu" {{ old('kategori') == 'Lagu' ? 'selected' : '' }}>Lagu</option>
                    </select>
                    @error('kategori')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="tahun" class="block text-sm font-medium text-gray-700 mb-1">Tahun</label>
                    <input type="number" id="tahun" name="tahun" class="w-full px-4 py-2 border border-gray-300 rounded-lg transition duration-200 
                    @error('username') border-red-500 @enderror" value="{{ old('tahun') }}" placeholder="Tahun rilis/terkenal" max="{{ date('Y') }}">
                    @error('tahun')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg transition duration-200 
                    @error('username') border-red-500 @enderror" placeholder="Ceritakan kenangan tentang nostalgia ini">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="link" class="block text-sm font-medium text-gray-700 mb-1">Link Referensi</label>
                    <input type="url" id="link" name="link" class="w-full px-4 py-2 border border-gray-300 rounded-lg transition duration-200 
                    @error('username') border-red-500 @enderror" value="{{ old('link') }}" placeholder="https://wikipedia.com/aku-suka-dia">
                    @error('link')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="text-center">
                    <button type="submit" class="w-full md:w-auto border border-[#1E376A] bg-[#1E376A] hover:bg-white text-white hover:text-[#1E376A] font-medium px-6 py-2 rounded-lg transition duration-200">
                        Simpan Nostalgia
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
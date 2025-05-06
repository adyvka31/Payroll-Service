@extends('layouts.layout')

@section('content')

{{-- Form Tambah / Edit Karyawan --}}
<form 
    action="{{ route('pengajuan.store') }}" 
    method="POST" 
    id="formkaryawan"
    class="space-y-12 w-6/7 mx-auto mt-40 border border-black rounded-lg p-6"
>
    @csrf
    <h2 class="text-xl text-center font-semibold text-gray-900">
        Form Pengajuan
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-6 gap-6">
        <div class="sm:col-span-3">
            <label for="name" class="block text-sm font-medium text-gray-900">Nama Karyawan</label>
            <div class="mt-2">
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    autocomplete="name" 
                    class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 border border-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm"
                >
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="sm:col-span-3">
            <label for="judul" class="block text-sm font-medium text-gray-900">Judul Pengajuan</label>
            <div class="mt-2">
                <input 
                    type="text" 
                    name="judul" 
                    id="judul" 
                    autocomplete="off" 
                    class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 border border-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm"
                >
                @error('judul')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="sm:col-span-full">
            <label for="deskripsi" class="block text-sm font-medium text-gray-900">Deskripsi</label>
            <div class="mt-2">
                <textarea 
                    name="deskripsi" 
                    id="deskripsi" 
                    rows="5" 
                    class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 border border-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm"
                ></textarea>
                @error('deskripsi')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Tombol --}}
        <div class="mt-6 flex gap-4">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg px-5 py-2">
                Simpan
            </button>
            <a href="{{ route('pengajuan') }}" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 font-medium rounded-lg px-5 py-2" data-action="cancel">
                Batal
            </a>
        </div>
    </div>
</form>

@if (session('success'))
    <div class="bg-green-100 text-green-700 p-4 rounded">
        {{ session('success') }}
    </div>
@endif


{{-- Tabel Data Karyawan --}}
<div class="relative overflow-x-auto border border-black sm:rounded-lg w-6/7 mx-auto my-12" id="tabelkaryawan">
    <table class="w-full text-sm text-left text-gray-500">
        <caption class="py-7 text-xl font-semibold text-center text-gray-900 bg-white">
            Riwayat Pengajuan Karyawan
        </caption>
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th class="px-6 py-3">Nama Karyawan</th>
                <th class="px-6 py-3">Judul Pengajuan</th>
                <th class="px-6 py-3">Dskripsi</th>
                <th class="px-6 py-3">Status</th>
                <th class="px-6 py-3">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengajuans as $pengajuan)
                <tr class="bg-white hover:bg-gray-50">
                    <td class="px-6 py-4 font-semibold text-black">{{ $pengajuan->name }}</td>
                    <td class="px-6 py-4">{{ $pengajuan->judul }}</td>
                    <td class="px-6 py-4">{{ $pengajuan->deskripsi }}</td>
                    <td class="px-6 py-4">{{ $pengajuan->status }}</td>
                    <td class="px-6 py-4">{{ $pengajuan->tanggal_pengajuan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@extends('layouts.layout')

@section('content')
{{-- Tabel Data Karyawan --}}
<div class="pt-24">
  <div class="relative overflow-x-auto border-[0.8px] border-black sm:rounded-lg w-6/7 mx-auto my-12" id="tabelkaryawan">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ay-400">
      <caption class="py-7 text-xl font-semibold text-center text-gray-900 bg-white ite -800">
        Keterangan Gaji Karyawan
      </caption>
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 -700 ay-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nama
                </th>
                <th scope="col" class="px-6 py-3">
                    Jabatan
                </th>
                <th scope="col" class="px-6 py-3">
                    Gaji Pokok
                </th>
                <th scope="col" class="px-6 py-3">
                    Tambahan
                </th>
                <th scope="col" class="px-6 py-3">
                  Potongan
                </th>
                <th scope="col" class="px-6 py-3">
                Print
                </th>
            </tr>
        </thead>
        <tbody>
          @foreach ($karyawan as $kar)
          <tr class="bg-white border-b -800 gray-700 border-gray-200 hover:bg-gray-50 g-gray-600">
            <th scope="row" class="px-6 py-4 text-black font-semibold">
                {{ $kar->name }}
            </th>
            <td class="px-6 py-4">
              {{ $kar->jabatan }}
            </td>
            <td class="px-6 py-4">
              Rp{{ number_format($kar->gaji, 0, ',', '.') }}
            </td>
            <td class="px-6 py-4">
              Rp{{ number_format($kar->gaji_tambahan, 0, ',', '.') }}
            </td>
            <td class="px-6 py-4">
              Rp{{ number_format($kar->gaji_potongan, 0, ',', '.') }}
            </td>
            <td class="px-6 py-4">
              <a href="{{ route('detailcetak', $kar) }}">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 font-normal rounded-lg text-sm px-5 py-2">
                  Print
                </button>
              </a>
            </td>
        </tr>
          @endforeach
        </tbody>
    </table>
  </div>

  <div class="relative overflow-x-auto border-[0.8px] border-black sm:rounded-lg w-6/7 mx-auto my-12" id="tabelkaryawan">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ay-400">
      <caption class="py-7 text-xl font-semibold text-center text-gray-900 bg-white ite -800">
        Tabel Pengajuan
      </caption>
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 -700 ay-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nama
                </th>
                <th scope="col" class="px-6 py-3">
                    Judul
                </th>
                <th scope="col" class="px-6 py-3">
                    Deskripsi
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
          @foreach ($pengajuans as $pengajuan)
          <tr class="bg-white border-b -800 gray-700 border-gray-200 hover:bg-gray-50 g-gray-600">
            <th scope="row" class="px-6 py-4 text-black font-semibold">
                {{ $pengajuan->name }}
            </th>
            <td class="px-6 py-4">
              {{ $pengajuan->judul }}
            </td>
            <td class="px-6 py-4">
              {{ $pengajuan->deskripsi }}
            </td>
            <td class="px-6 py-4">
              {{ $pengajuan->status }}
            </td>
            <td class="px-6 py-4 flex gap-2">
              @if ($pengajuan->status === 'Diproses')
              <form action="{{ route('pengajuan.accept', $pengajuan->id) }}" method="POST">
                  @csrf
                  <button type="submit" class="text-white bg-green-700 hover:bg-green-800 font-normal rounded-lg text-sm px-5 py-2">
                      Yes
                  </button>
              </form>
      
              <form action="{{ route('pengajuan.reject', $pengajuan->id) }}" method="POST">
                  @csrf
                  <button type="submit" class="text-white bg-red-700 hover:bg-red-800 font-normal rounded-lg text-sm px-5 py-2">
                      No
                  </button>
              </form>
              @else
                <span class="text-gray-500 italic">Sudah {{ $pengajuan->status }}</span>
              @endif
            </td>
        </tr>
          @endforeach
        </tbody>
    </table>
  </div>
</div>
  @endsection
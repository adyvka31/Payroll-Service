@extends('layouts.layout')

@section('content')
{{-- Tabel Data Karyawan --}}
<div class="pt-24">
  <div class="relative overflow-x-auto border-[0.8px] border-black sm:rounded-lg w-6/7 mx-auto my-12" id="tabelkaryawan">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ay-400">
      <caption class="py-7 text-xl font-semibold text-center text-gray-900 bg-white ite -800">
        Absensi Karyawan
      </caption>
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 -700 ay-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nama
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal
                </th>
                <th scope="col" class="px-6 py-3">
                    Jam Masuk
                </th>
                <th scope="col" class="px-6 py-3">
                    Jam Keluar
                </th>
            </tr>
        </thead>
        <tbody>
          @foreach ($absensis as $absensi)
          <tr class="bg-white border-b -800 gray-700 border-gray-200 hover:bg-gray-50 g-gray-600 item-center">
            <th scope="row" class="px-6 py-4 text-black font-semibold">
              {{ $absensi->karyawan_name }}
            </th>
            <td class="px-6 py-4">
                {{ $absensi->tanggal }}
            </td>
            <td class="px-6 py-4">
              {{ \Carbon\Carbon::parse($absensi->created_at)->format('H:i:s') }}
            </td>
            <td class="px-6 py-4">
              {{ $absensi->jam_keluar ? \Carbon\Carbon::parse($absensi->jam_keluar)->format('H:i:s') : '-' }}
            </td>
        </tr>
          @endforeach
        </tbody>
    </table>
  </div>
</div>
  @endsection
@extends('layouts.layout')

@section('content')

<div class="flex mx-auto mt-40 items-center justify-center mb-8">
    <form action="{{ route('absensi.masuk') }}" method="POST" class="mr-2">
        @csrf
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
            Presensi Masuk
        </button>
    </form>

    <form action="{{ route('absensi.keluar') }}" method="POST">
        @csrf
        <button type="submit"
            class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5">
            Presensi Keluar
        </button>
    </form>
</div>

@if (session('success'))
    <div class="bg-green-100 text-green-800 px-4 py-2 rounded text-center">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="bg-red-100 w-6/7 mx-auto text-red-800 px-4 py-2 rounded text-center">
        {{ session('error') }}
    </div>
@endif


<div class="">
    <div class="relative overflow-x-auto border-[0.8px] border-black sm:rounded-lg w-6/7 mx-auto" id="tabelkaryawan">
      <table class="w-full text-sm text-left rtl:text-right text-gray-500 ay-400">
        <caption class="py-7 text-xl font-semibold text-center text-gray-900 bg-white ite -800">
          Riwayat Presensi
        </caption>
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 -700 ay-400">
              <tr>
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
            @foreach ($karyawan as $data)
            <tr class="bg-white border-b -800 gray-700 border-gray-200 hover:bg-gray-50 g-gray-600 item-center">
              <td scope="row" class="px-6 py-4 text-black font-semibold">
                  {{ $data->tanggal }}
              </td>
              <td class="px-6 py-4">
                {{ \Carbon\Carbon::parse($data->created_at)->format('H:i:s') }}
              </td>
              <td class="px-6 py-4">
                {{ $data->jam_keluar ? \Carbon\Carbon::parse($data->jam_keluar)->format('H:i:s') : '-' }}
              </td>
          </tr>
            @endforeach
          </tbody>
      </table>
    </div>
  </div>

@endsection
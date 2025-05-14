@extends('layouts.layout')

@section('content')
<div class="pt-24">
  <div class="relative overflow-x-auto border-[0.8px] border-black px-6 sm:rounded-lg w-6/7 mx-auto my-12" id="tabelkaryawan">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ay-400">
      <caption class="py-7 text-xl font-semibold text-center text-gray-900 bg-white ite -800">
        PDF Gaji Karyawan
      </caption>
        <tbody>
          <tr class="bg-white border-b -800 gray-700 border-gray-200 hover:bg-gray-50 g-gray-600 item-center">
            <th scope="row" class="px-6 py-4 text-black font-semibold border-gray-200 border-1 w-1/4">
              Nama
            </th>
            <td class="px-6 py-4 border-gray-200 border-1 w-1/4">
               {{ $karyawan->name }}
            </td>
            <td class="px-6 py-4 text-black font-semibold border-gray-200 border-1 w-1/4">
                Posisi
            </td>
            <td class="px-6 py-4 border-gray-200 border-1 w-1/4">
                {{ $karyawan->jabatan }}
            </td>
        </tr>
        <tr class="bg-white border-b -800 gray-700 border-gray-200 hover:bg-gray-50 g-gray-600 item-center">
            <th scope="row" class="px-6 py-4 text-black font-semibold border-gray-200 border-1 w-1/4">
              NIK
            </th>
            <td class="px-6 py-4 border-gray-200 border-1 w-1/4">
               {{ $karyawan->nik }}
            </td>
            <td class="px-6 py-4 text-black font-semibold border-gray-200 border-1 w-1/4">
                Tanggal Cetak
            </td>
            <td class="px-6 py-4 border-gray-200 border-1 w-1/4">
                {{ $karyawan->created_at->format('d F Y') }}
            </td>
        </tr>
        <tr class="bg-white border-b -800 gray-700 border-gray-200 hover:bg-gray-50 g-gray-600 item-center">
            <th scope="row" class="px-6 py-4 text-black font-semibold border-gray-200 border-1 w-1/4">
              Email
            </th>
            <td class="px-6 py-4 border-gray-200 border-1 w-1/4">
               {{ $karyawan->email }}
            </td>
            <td class="px-6 py-4 text-black font-semibold border-gray-200 border-1 w-1/4">
                Tanggal Pembayaran
            </td>
            <td class="px-6 py-4 border-gray-200 border-1 w-1/4">
                {{ $karyawan->created_at->format('d F Y') }}
            </td>
        </tr>
        </tbody>
    </table>

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ay-400">
      <caption class="py-7 text-lg font-semibold text-left text-gray-900 bg-white -mb-4">
        Rincian Pemasukan
      </caption>
        <tbody>
          <tr class="bg-white border-b -800 gray-700 border-gray-200 hover:bg-gray-50 g-gray-600 item-center">
            <th scope="row" class="px-6 py-4 text-black font-semibold border-gray-200 border-1 w-1/2">
              Deskripsi
            </th>
            <td class="px-6 py-4 border-gray-200 text-black font-semibold border-1 w-1/2">
               Jumlah
            </td>
        </tr>
        <tr class="bg-white border-b -800 gray-700 border-gray-200 hover:bg-gray-50 g-gray-600 item-center">
            <th scope="row" class="px-6 py-4 border-gray-200 border-1 w-1/2">
              Gaji Pokok
            </th>
            <td class="px-6 py-4 border-gray-200 border-1 w-1/2">
               Rp{{ number_format($karyawan->gaji, 0, ',', '.') }}
            </td>
        </tr>
        <tr class="bg-white border-b -800 gray-700 border-gray-200 hover:bg-gray-50 g-gray-600 item-center">
            <th scope="row" class="px-6 py-4 border-gray-200 border-1 w-1/2">
              Gaji Tambahan
            </th>
            <td class="px-6 py-4 border-gray-200 border-1 w-1/2">
               Rp{{ number_format($karyawan->gaji_tambahan, 0, ',', '.') }}
            </td>
        </tr>
        </tbody>
    </table>

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ay-400">
      <caption class="py-7 text-lg font-semibold text-left text-gray-900 bg-white -mb-4">
        Rincian Potongan
      </caption>
        <tbody>
          <tr class="bg-white border-b -800 gray-700 border-gray-200 hover:bg-gray-50 g-gray-600 item-center">
            <th scope="row" class="px-6 py-4 text-black font-semibold border-gray-200 border-1 w-1/2">
              Deskripsi
            </th>
            <td class="px-6 py-4 border-gray-200 text-black font-semibold border-1 w-1/2">
               Jumlah
            </td>
        </tr>
        <tr class="bg-white border-b -800 gray-700 border-gray-200 hover:bg-gray-50 g-gray-600 item-center">
            <th scope="row" class="px-6 py-4 border-gray-200 border-1 w-1/2">
              Potongan Gaji
            </th>
            <td class="px-6 py-4 border-gray-200 border-1 w-1/2">
               Rp{{ number_format($karyawan->gaji_potongan, 0, ',', '.') }}
            </td>
        </tr>
        </tbody>
    </table>

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 mt-8">
        <tbody>
          <tr class="bg-white border-b -800 gray-700 border-gray-200 hover:bg-gray-50 g-gray-600 item-center">
            <th scope="row" class="px-6 py-4 text-black font-semibold border-gray-200 border-1 w-1/2">
              Gaji Bersih
            </th>
            <td class="px-6 py-4 border-gray-200 text-black font-semibold border-1 w-1/2">
              Rp{{ number_format($karyawan->gaji_bersih, 0, ',', '.') }}
            </td>
        </tr>
        </tbody>
    </table>

    <div class="flex justify-between px-12 pb-12">
        <h3 class="border-t-2 w-48 text-center mt-28 pt-4 text-sm">Disetujui Oleh, <br> (HRD/Pimpinan)</h3>
        <h3 class="border-t-2 w-48 text-center mt-28 pt-4 text-sm">Diterima Oleh, <br> ({{ $karyawan->name }})</h3>
    </div>
  </div>

  <div class="flex justify-center">
    <button onclick="printTable()" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-8 py-3 me-2 mb-2">Download & Print</button>
  </div>
</div>

<script>
    function printTable() {
        const originalContents = document.body.innerHTML;
        const printContents = document.getElementById("tabelkaryawan").innerHTML;

        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload(); // reload halaman setelah print
    }
</script>
@endsection

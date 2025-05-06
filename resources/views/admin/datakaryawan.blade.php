@extends('layouts.layout')

@section('content')
{{-- Tabel Data Karyawan --}}
<div class="pt-24">
  <div class="relative overflow-x-auto border-[0.8px] border-black sm:rounded-lg w-6/7 mx-auto my-12" id="tabelkaryawan">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ay-400">
      <caption class="py-7 text-xl font-semibold text-center text-gray-900 bg-white ite -800">
        Data Karyawan
      </caption>
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 -700 ay-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nama
                </th>
                <th scope="col" class="px-6 py-3">
                    NIK
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    No HP
                </th>
                <th scope="col" class="px-6 py-3">
                    Jabatan
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal Masuk
                </th>
                <th scope="col" class="px-6 py-3">
                    Gaji Pokok
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
          @foreach ($karyawan as $karyawan)
          <tr class="bg-white border-b -800 gray-700 border-gray-200 hover:bg-gray-50 g-gray-600">
            <th scope="row" class="px-6 py-4 text-black font-semibold">
                {{ $karyawan->name }}
            </th>
            <td class="px-6 py-4">
                {{ $karyawan->nik }}
            </td>
            <td class="px-6 py-4">
              {{ $karyawan->email }}
            </td>
            <td class="px-6 py-4">
              {{ $karyawan->no_hp }}
            </td>
            <td class="px-6 py-4">
              {{ $karyawan->jabatan }}
            </td>
            <td class="px-6 py-4">
              {{ $karyawan->tanggal_masuk }}
            </td>
            <td class="px-6 py-4">
              {{ $karyawan->gaji }}
            </td>
            <td class="px-6 py-4">
              {{ $karyawan->status }}
            </td>
            <td class="px-6 py-4 flex">
                <a href="{{ route('karyawan.edit', $karyawan) }}" class="text-blue-600 hover:underline mr-1.5" data-action="edit" >Edit</a>
                <form action="{{ route('karyawan.destroy', $karyawan) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="font-medium text-red-600 hover:underline" data-action="delete" >Delete</button>
                </form> 
            </td>
        </tr>
          @endforeach
        </tbody>
    </table>
  </div>
  
  {{-- Form Tambah / Edit Karyawan --}}
  <form 
    action="{{ isset($karyawanToEdit) ? route('karyawan.update', $karyawanToEdit) : route('datakaryawan.store') }}" 
    method="POST" 
    id="formkaryawan"
    class="space-y-12 w-6/7 mx-auto mt-14 border-[0.8px] border-black rounded-lg p-6"
  >
    @csrf
    @if (isset($karyawanToEdit))
      @method('PUT')
    @endif
  
    <h2 class="text-xl text-center font-semibold text-gray-900">
      {{ isset($karyawanToEdit) ? 'Edit Karyawan' : 'Input Karyawan' }}
    </h2>
  
    <div class="grid grid-cols-1 sm:grid-cols-6 gap-6">
      {{-- Nama --}}
      <div class="sm:col-span-3">
        <label for="name" class="block text-sm font-medium text-gray-900">Nama</label>
        <input type="text" name="name" id="name"
          value="{{ old('name', $karyawanToEdit->name ?? '') }}"
          class="block w-full rounded-md bg-white px-3 py-2.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 mt-1.5" />
        @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
      </div>
  
      {{-- NIK --}}
      <div class="sm:col-span-3">
        <label for="nik" class="block text-sm font-medium text-gray-900">NIK</label>
        <input type="text" name="nik" id="nik"
          value="{{ old('nik', $karyawanToEdit->nik ?? '') }}"
          class="block w-full rounded-md bg-white px-3 py-2.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 mt-1.5" />
        @error('nik') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
      </div>
  
      {{-- Email --}}
      <div class="sm:col-span-3">
        <label for="email" class="block text-sm font-medium text-gray-900">Email</label>
        <input type="email" name="email" id="email"
          value="{{ old('email', $karyawanToEdit->email ?? '') }}"
          class="block w-full rounded-md bg-white px-3 py-2.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 mt-1.5" />
        @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
      </div>
  
      {{-- No HP --}}
      <div class="sm:col-span-3">
        <label for="no_hp" class="block text-sm font-medium text-gray-900">No HP</label>
        <input type="text" name="no_hp" id="no_hp"
          value="{{ old('no_hp', $karyawanToEdit->no_hp ?? '') }}"
          class="block w-full rounded-md bg-white px-3 py-2.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 mt-1.5" />
        @error('no_hp') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
      </div>
  
      {{-- Jabatan --}}
      <div class="sm:col-span-3">
        <label for="jabatan" class="block text-sm font-medium text-gray-900">Jabatan</label>
        <select name="jabatan" id="jabatan" class="block w-full rounded-md bg-white px-3 py-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 mt-1.5">
          <option value="direktur" {{ old('jabatan', $karyawanToEdit->jabatan ?? '') == 'direktur' ? 'selected' : '' }}>Direktur</option>
          <option value="manager" {{ old('jabatan', $karyawanToEdit->jabatan ?? '') == 'manager' ? 'selected' : '' }}>Manager</option>
          <option value="pegawai" {{ old('jabatan', $karyawanToEdit->jabatan ?? '') == 'pegawai' ? 'selected' : '' }}>Pegawai</option>
        </select>
        @error('jabatan') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
      </div>
  
      {{-- Tanggal Masuk --}}
      <div class="sm:col-span-3">
        <label for="tanggal_masuk" class="block text-sm font-medium text-gray-900">Tanggal Masuk</label>
        <input type="date" name="tanggal_masuk" id="tanggal_masuk"
          value="{{ old('tanggal_masuk', $karyawanToEdit->tanggal_masuk ?? '') }}"
          class="block w-full rounded-md bg-white px-3 py-2.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 mt-1.5" />
        @error('tanggal_masuk') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
      </div>
  
      {{-- Gaji --}}
      <div class="sm:col-span-3">
        <label for="gaji" class="block text-sm font-medium text-gray-900">Gaji Pokok</label>
        <input type="number" name="gaji" id="gaji"
          value="{{ old('gaji', $karyawanToEdit->gaji ?? '') }}"
          class="block w-full rounded-md bg-white px-3 py-2.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 mt-1.5" readonly />
        @error('gaji') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
      </div>
  
      {{-- Status --}}
      <div class="sm:col-span-3">
        <label for="status" class="block text-sm font-medium text-gray-900">Status</label>
        <select name="status" id="status" class="block w-full rounded-md bg-white px-3 py-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 mt-1.5">
          <option value="Aktif" {{ old('status', $karyawanToEdit->status ?? '') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
          <option value="Tidak Aktif" {{ old('status', $karyawanToEdit->status ?? '') == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
        </select>
        @error('status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
      </div>
    </div>
  
    {{-- Tombol --}}
    <div class="mt-6 flex gap-4">
      <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg px-5 py-2">
        {{ isset($karyawanToEdit) ? 'Update' : 'Simpan' }}
      </button>
      <a href="{{ route('datakaryawan') }}"
        class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 font-medium rounded-lg px-5 py-2" data-action="cancel">
        Batal
      </a>
    </div>
  </form>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const jabatanSelect = document.getElementById('jabatan');
    const gajiInput = document.getElementById('gaji');

    function setGajiPokok() {
      const jabatan = jabatanSelect.value;
      let gaji = 0;

      if (jabatan === 'direktur') gaji = 5000000;
      else if (jabatan === 'manager') gaji = 2500000;
      else if (jabatan === 'pegawai') gaji = 1000000;

      gajiInput.value = gaji;
    }

    // Set saat load awal (untuk edit mode)
    setGajiPokok();

    // Set saat jabatan berubah
    jabatanSelect.addEventListener('change', setGajiPokok);
  });
</script>
@endsection
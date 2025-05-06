<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\pengajuan;
use App\Models\Absensi;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $karyawan = Karyawan::all(); // Ambil semua data
        return view('index', compact('karyawan'));
    }

    public function datakaryawan(Request $request)
    {
        $karyawan = Karyawan::all(); // Ambil semua data
        return view('admin.datakaryawan', compact('karyawan'));
    }

    public function absensi(Request $request)
    {
        $karyawan = Karyawan::all();
        $absensis = Absensi::orderBy('tanggal', 'desc')->get();
        return view('admin.absensi', compact('karyawan', 'absensis'));
    }

    public function gaji(Request $request)
    {
        $karyawan = Karyawan::all(); // Ambil semua data
        $pengajuans = Pengajuan::latest()->get();
        return view('admin.gaji', compact('karyawan', 'pengajuans'));
    }

    public function acceptPengajuan($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->update([
           'status' => 'diterima'
        ]);
        return redirect()->back()->with('success', 'Pengajuan diterima.');
    }

    public function rejectPengajuan($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->update([
            'status' => 'ditolak'
        ]);
        return redirect()->back()->with('success', 'Pengajuan ditolak.');
    }

    public function cetak(Request $request)
    {
        $karyawan = Karyawan::all(); // Ambil semua data
        return view('admin.cetak', compact('karyawan'));
    }

    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required|string|max:255',
        'nik'  => 'required|string|max:50',
        'email' => 'required|email',
        'no_hp' => 'nullable|string|max:20',
        'jabatan' => 'nullable|string|max:100',
        'tanggal_masuk' => 'required|string|max:255',
        'gaji' => 'nullable|numeric',
        'status' => 'required|in:Aktif,Tidak Aktif'
        ]);

        Karyawan::create([
        'name' => $request->name,
        'nik' => $request->nik,
        'email' => $request->email,
        'no_hp' => $request->no_hp,
        'jabatan' => $request->jabatan,
        'tanggal_masuk' => $request->tanggal_masuk,
        'gaji' => $request->gaji,
        'status' => $request->status
        ]);

        return redirect()->route('datakaryawan')->with('success', 'Data berhasil disimpan');
    }

    public function edit(Karyawan $karyawan)
    {
        return view('admin.datakaryawan', [
            'karyawan' => Karyawan::all(),
            'karyawanToEdit' => $karyawan,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
        'name' => 'required|string|max:255',
        'nik'  => 'required|string|max:50',
        'email' => 'required|email',
        'no_hp' => 'nullable|string|max:20',
        'jabatan' => 'nullable|string|max:100',
        'tanggal_masuk' => 'required|string|max:255',
        'gaji' => 'nullable|numeric',
        'status' => 'required|in:Aktif,Tidak Aktif'
        ]);

        $karyawan = Karyawan::findOrFail($id);

        $karyawan->update([
        'name' => $request->name,
        'nik' => $request->nik,
        'email' => $request->email,
        'no_hp' => $request->no_hp,
        'jabatan' => $request->jabatan,
        'tanggal_masuk' => $request->tanggal_masuk,
        'gaji' => $request->gaji,
        'status' => $request->status
        ]);

        return redirect()->route('datakaryawan')->with(['Succes', 'Data berhasil diperbarui']);
    }

    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();
        
        return redirect()->route('datakaryawan')->with('success', 'Buku berhasil dihapus!');
    }
    
    public function gajiTambahan()
{
    $karyawan = Karyawan::with('absensi')->get();
    $pengajuans = Pengajuan::all();

    foreach ($karyawan as $kar ) {
        // Ambil absensi terakhir berdasarkan nama
        $absensi = Absensi::where('karyawan_name', $kar->name)
                    ->orderBy('created_at', 'desc')->first();

        if ($absensi && $absensi->created_at && $absensi->jam_keluar) {
            $jamMasuk = Carbon::parse($absensi->created_at);
            $jamKeluar = Carbon::parse($absensi->jam_keluar);

            $menitKerja = $jamKeluar->diffInMinutes($jamMasuk);

            $kar->gaji_tambahan = $menitKerja * 10000;
        } else {
            $kar->gaji_tambahan = 0;
        }

        $kar->save();
    }

    return view('gaji', compact('karyawan', 'pengajuans'));
}
}
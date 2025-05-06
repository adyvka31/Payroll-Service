<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Absensi;
use App\Models\Pengajuan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function absensi(Request $request)
    {
        $karyawan = Absensi::orderBy('tanggal', 'desc')->get();
        return view('karyawan.absensi', compact('karyawan'));
    }

    public function presensiMasuk(Request $request)
    {
        $today = Carbon::today()->toDateString();
        $karyawanName = Auth::user()->name;
        $existing = Absensi::where('tanggal', $today)->where('karyawan_name', $karyawanName)->first();

        if ($existing) {
            return redirect()->back()->with('error', 'Anda sudah melakukan presensi masuk hari ini.');
        }

        Absensi::create([
            'karyawan_name' => $karyawanName,
            'tanggal' => $today,
            'jam_masuk' => now(),
        ]);

        return redirect()->back()->with('success', 'Presensi Masuk berhasil dicatat.');
    }

    public function presensiKeluar(Request $request)
    {
        $today = Carbon::today()->toDateString();
        $karyawanName = Auth::user()->name;
        $absensi = Absensi::where('tanggal', $today)->where('karyawan_name', $karyawanName)->first();

        if (!$absensi) {
            return redirect()->back()->with('error', 'Presensi masuk belum dilakukan.');
        }

        if ($absensi->jam_keluar) {
            return redirect()->back()->with('error', 'Anda sudah melakukan presensi keluar hari ini.');
        }

        $absensi->jam_keluar = now();
        $absensi->save();

        return redirect()->back()->with('success', 'Presensi keluar berhasil dicatat.');
    }

    public function pengajuan()
    {
        $pengajuans = Pengajuan::latest()->get();
        return view('karyawan.pengajuan', compact('pengajuans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        Pengajuan::create([
            'name' => $request->name,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->back()->with('succes', 'Pengajuan berhasil dikirim');
    }
}

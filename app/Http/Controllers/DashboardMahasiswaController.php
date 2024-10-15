<?php

namespace App\Http\Controllers;

use App\Models\DashboardProdi;
use App\Models\DashoboardMahasiswa;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Barryvdh\DomPDF\Facade\Pdf;

class DashboardMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswas=DashoboardMahasiswa::latest()->paginate(10);
        return view('dashboard.mahasiswa.index',['mahasiswas'=>$mahasiswas]);
    }

    public function cetakPdf()
    {
        $pdf = Pdf::loadView('dashboard.mahasiswa.cetak_pdf', ['mahasiswas'=>DashoboardMahasiswa::all()]);
        //return $pdf->download('Laporan-Data-Mahasiswa.pdf');
        return $pdf->stream('Laporan-Data-Mahasiswa.pdf');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodis = DashboardProdi::all();
        return view('dashboard.mahasiswa.create',['prodis'=>$prodis]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|unique:mahasiswas',
            'nama_lengkap' => 'required|min:3',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'email' => 'required',
            'prodi_id' => 'required',
            'alamat' => 'nullable'
        ]);

            //dd($validated);
            DashoboardMahasiswa::create($validated);
            return redirect('/dashboard-mahasiswa')->with('pesan','Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mahasiswas = DashoboardMahasiswa::findOrFail($id);
        return view('dashboard.mahasiswa.show', compact('mahasiswas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $prodis = Prodi::all();
        $mahasiswas = DashoboardMahasiswa::find($id);
        return view('dashboard.mahasiswa.edit', compact('prodis','mahasiswas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nim' => 'required|max:10',
            'nama_lengkap' => 'required|min:3',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'email' => 'required',
            'prodi_id' => 'required',
            'alamat' => 'nullable'
        ]);
        DashoboardMahasiswa::where('id', $id)->update($validated);
        return redirect('/dashboard-mahasiswa')->with('pesan', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DashoboardMahasiswa::destroy($id);
        return redirect('dashboard-mahasiswa')->with('pesan', 'Data Berhasil Dihapus');
    }
}

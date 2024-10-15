<?php

namespace App\Http\Controllers;

use App\Models\DashboardDosen;
use App\Models\DashboardProdi;
use App\Models\DashoboardMahasiswa;
use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Barryvdh\DomPDF\Facade\Pdf;

class DashboardProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosens=DashboardDosen::latest()->paginate(10);
        $mahasiswas=DashoboardMahasiswa::latest()->paginate(10);
        $prodis=DashboardProdi::latest()->paginate(10);

        return view('dashboard.prodi.index',['mahasiswas'=>$mahasiswas,'dosens'=>$dosens, 'prodis'=>$prodis ]);

    }

    public function cetakPdf()
    {
        $prodis = DashboardProdi::paginate(10);
        $pdf = Pdf::loadView('dashboard.prodi.cetak_pdf', ['prodis' => $prodis]);
        return $pdf->stream('Laporan-Data-Prodi.pdf');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodis = Prodi::all();
        return view('dashboard.prodi.create', ['prodis' => Prodi::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|min:3',
        ]);
        //dd($validated);
        DashboardProdi::create($validated);
        return redirect('dashboard-prodi')->with('pesan', 'Data Berhasil Di-tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prodis = Prodi::findOrFail($id);
        return view('dashboard.prodi.show', compact('prodis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $prodis = Prodi::find($id);
        return view('dashboard.prodi.edit', compact('prodis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama' => 'required|min:3'
        ]);
        Prodi::where('id', $id)->update($validated);
        return redirect('dashboard-prodi')->with('pesan', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Prodi::destroy($id);
        return redirect('dashboard-prodi')->with('pesan', 'Data berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\DashboardMataKuliah;
use App\Models\DashboardProdi;
use App\Models\Prodi;
use Illuminate\Http\Request;

class DashboardMataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matakuliahs=DashboardMataKuliah::latest()->paginate(10);
        return view('dashboard.matakuliah.index',['matakuliahs'=>$matakuliahs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodis = DashboardProdi::all();
        return view('dashboard.matakuliah.create',['prodis'=>$prodis]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_mk' => 'required',
            'nama_mk' => 'required|max:255',
            'sks' => 'required',
            'semester' => 'required',
        ]);

            //dd($validated);
            DashboardMataKuliah::create($validated);
            return redirect('/dashboard-matakuliah')->with('pesan','Data Berhasil Disimpan');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $matakuliahs = DashboardMataKuliah::findOrFail($id);
        return view('dashboard.matakuliah.show', compact('matakuliahs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $prodis = Prodi::all();
        $matakuliahs = DashboardMataKuliah::find($id);
        return view('dashboard.matakuliah.edit', compact('prodis','matakuliahs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'kode_mk' => 'required',
            'nama_mk' => 'required|max:255',
            'sks' => 'required',
            'semester' => 'required',
        ]);
        DashboardMataKuliah::where('id', $id)->update($validated);
        return redirect('/dashboard-matakuliah')->with('pesan', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DashboardMataKuliah::destroy($id);
        return redirect('dashboard-matakuliah')->with('pesan', 'Data Berhasil Dihapus');
    }
}

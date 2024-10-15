<?php

namespace App\Http\Controllers;

use App\Models\DashboardJabatan;
use App\Models\DashboardProdi;
use App\Models\Prodi;
use Illuminate\Http\Request;

class DashboardJabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jabatanss=DashboardJabatan::latest()->paginate(10);
        return view('dashboard.jabatan.index',['jabatanss'=>$jabatanss]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodis = DashboardProdi::all();
        return view('dashboard.jabatan.create',['prodis'=>$prodis]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_jabatan' => 'required',
            'nama_jabatan' => 'required|max:255',
        ]);

            //dd($validated);
            DashboardJabatan::create($validated);
            return redirect('/dashboard-jabatan')->with('pesan','Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jabatanss = DashboardJabatan::findOrFail($id);
        return view('dashboard.jabatan.show', compact('jabatanss'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $prodis = Prodi::all();
        $jabatanss = DashboardJabatan::find($id);
        return view('dashboard.jabatan.edit', compact('prodis','jabatanss'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'kode_jabatan' => 'required',
            'nama_jabatan' => 'required|max:255',
        ]);
        DashboardJabatan::where('id', $id)->update($validated);
        return redirect('/dashboard-jabatan')->with('pesan', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DashboardJabatan::destroy($id);
        return redirect('dashboard-jabatan')->with('pesan', 'Data Berhasil Dihapus');
    }
}

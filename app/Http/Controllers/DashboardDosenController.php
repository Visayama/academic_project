<?php

namespace App\Http\Controllers;
use App\Models\DashboardDosen;
use App\Models\DashboardProdi;
use App\Models\Prodi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (! Gate::allows('admin')) {
            abort(403);
        }
        $dosens=DashboardDosen::latest()->paginate(10);
        return view('dashboard.dosen.index',['dosens'=>$dosens]);
    }

    public function cetakPdf()
    {
        $pdf = Pdf::loadView('dashboard.dosen.cetak_pdf', ['dosens'=>DashboardDosen::all()]);
        //return $pdf->download('Laporan-Data-Mahasiswa.pdf');
        return $pdf->stream('Laporan-Data-Dosen.pdf');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodis = DashboardProdi::all();
        return view('dashboard.dosen.create',['prodis'=>$prodis]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|unique:dosens',
            'nama' => 'required|min:3',
            'email' => 'required',
            'no_telp' => 'required',
            'prodi_id' => 'required',
            'alamat' => 'nullable'
        ]);

            //dd($validated);
            DashboardDosen::create($validated);
            return redirect('/dashboard-dosen')->with('pesan','Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $dosens = DashboardDosen::findOrFail($id);
        return view('dashboard.dosen.show', compact('dosens'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $prodis = Prodi::all();
        $dosens = DashboardDosen::find($id);
        return view('dashboard.dosen.edit', compact('prodis','dosens'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nik' => 'required|max:30',
            'nama' => 'required|min:3',
            'email' => 'required',
            'no_telp' => 'required',
            'prodi_id' => 'required',
            'alamat' => 'nullable'
        ]);
        DashboardDosen::where('id', $id)->update($validated);
        return redirect('/dashboard-dosen')->with('pesan', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DashboardDosen::destroy($id);
        return redirect('dashboard-dosen')->with('pesan', 'Data Berhasil Dihapus');
    }
}

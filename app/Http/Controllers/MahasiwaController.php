<?php

namespace App\Http\Controllers;

use App\Models\DashoboardMahasiswa;
use App\Models\Mahasiswa;
use App\Models\Mahasiwa;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class MahasiwaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = DashoboardMahasiswa::latest();

        if (request('search')) {
            $search = request('search');
            $query->where('nama_lengkap', 'like', '%' . Request('search') . '%')
                ->orWhere('email', 'like', '%' .  Request('search') . '%');
        }

        $mahasiswas = $query->paginate(10);
        return view('akademik.mahasiswa', ['mahasiwas' => $mahasiswas]);
    }
    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiwa $mahasiwa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiwa $mahasiwa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiwa $mahasiwa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiwa $mahasiwa)
    {
        //
    }
}

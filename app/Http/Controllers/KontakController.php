<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //return $request->all();
        $kontaks = Kontak::all();
        // foreach ($kontaks as $kontak) {
        //     $dalamat = $kontak->alamat;
        //     $dtelepon = $kontak->telepon;

        //     DB::table('kontaks')
        //         ->where('id', $kontak->id)
        //         ->update([
        //             'alamat' => $dalamat,
        //             'telepon' => $dtelepon,
        //         ]);

        // }
        //$kontaks = Kontak::where('alamat', 'LIKE', '%Singaraja%')->get();
        return view('kontak.kontak', compact('kontaks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kontak.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Kontak::create($request->all());
        return redirect()->route('kontak.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kontak $kontak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kontak $kontak)
    {
        $kontak_to_edit = Kontak::find($kontak->id);
        return view('kontak.edit', compact('kontak_to_edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kontak $kontak)
    {
        $kontak->fill($request->all());
        $kontak->save();
        return redirect()->route('kontak.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kontak $kontak)
    {
        $kontak_to_delete = Kontak::find($kontak->id);
        $kontak_to_delete->delete();
        return redirect()->route('kontak.index');
    }
}

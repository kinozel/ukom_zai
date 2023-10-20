<?php

namespace App\Http\Controllers;

use App\Models\Dkm;
use Illuminate\Http\Request;

class DkmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = [
            "dkm" => Dkm::all(),
        ];
        return view('dkm.index', $data);
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
    public function show(Dkm $dkm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dkm $dkm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dkm $dkm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dkm $dkm)
    {
        //
    }
}

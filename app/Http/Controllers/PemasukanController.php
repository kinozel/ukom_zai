<?php

namespace App\Http\Controllers;

use App\Http\Requests\PemasukanRequest;
use App\Http\Requests\PemasukanEditRequest;
use App\Models\JenisPemasukan;
use Illuminate\Http\JsonResponse;
use App\Models\Pemasukan;
use Illuminate\Http\Request;
use PDF;

class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        $data = [
            'pemasukan'=> Pemasukan::with('jenis_pemasukan')->orderByDesc('tanggal_pemasukan')->get(),
            'jenis_pemasukan'=> JenisPemasukan::all(),
        ];

        // return $data;

        return view('pemasukan.index', $data);
    }
    // public function cetakpemasukan2(){
    //     $pemasukan = Pemasukan::get();

    //     $pdf = PDF::loadView('pemasukan.cetak2',compact('pemasukan'));
    //     $pdf->setPaper('A4','potrait');

    //     return $pdf->download('cetakpemasukan2.pdf');
    // }
    public function cetakpemasukan()
    {
        $data = [
            'pemasukan'=> Pemasukan::with('jenis_pemasukan')->orderByDesc('tanggal_pemasukan')->get(),
            'jenis_pemasukan'=> JenisPemasukan::all(),
        ];

        // return $data;

        return view('pemasukan.cetak', $data);
    } 

    /**
     * Store a newly created resource in storage.
     */
    public function store(PemasukanRequest $request)
    {
        {
            $data = $request->validated();
    
            $pemasukan = Pemasukan::query()->create($data);
    
            if (!$pemasukan) {
                return response()->json([
                    'message' => 'Failed create pemasukan'
                ], 403);
            }
    
            return response()->json([
                'message' => 'Pemasukan created'
            ], 201);
        }
    }
    public function delete(int $id): JsonResponse
    {
        $pemasukan = Pemasukan::query()->find($id)->delete();

        if ($pemasukan):
            //Pesan Berhasil
            $pesan = [
                'success' => true,
                'pesan' => 'Data user berhasil dihapus'
            ];
        else:
            //Pesan Gagal
            $pesan = [
                'success' => false,
                'pesan' => 'Data gagal dihapus'
            ];
        endif;
        return response()->json($pesan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PemasukanEditRequest $request)
    {
        $data = $request->validated();
        $pemasukan = Pemasukan::query()->find($request->id);

        // if ($path = $request->file('file')) {
        //     // Delete old file
        //     if ($surat->file) {
        //         Storage::delete("public/$surat->file");
        //     }

        //     // Store new file
        //     $path = $path->storePublicly('', 'public');
        //     $data['file'] = $path;
        // }

        $pemasukan->fill($data)->save();

        return [
            'message' => 'Berhasil update surat!'
        ];
    }
    }

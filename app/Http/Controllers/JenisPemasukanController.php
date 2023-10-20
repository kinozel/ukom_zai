<?php

namespace App\Http\Controllers;

use App\Models\JenisPemasukan;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class JenisPemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = [
            'jenis_pemasukan'=> JenisPemasukan::all(),
        ];

        return view ('jenis_pemasukan.index', $data);
    }   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'jenis_pemasukan' => ['required']
        ]);

        if (JenisPemasukan::query()->where('jenis_pemasukan', $request->jenis_pemasukan)->count('id') ) {
            return response()->json([
                'message' => "Jenis pemasukan $request->jenis_pemasukan already exists."
            ], 400);
        }

        if ($data) {
            if ($request->id !== null) {
                $jenis_pemasukan = JenisPemasukan::query()->find($request->id);
                $jenis_pemasukan->fill($data);
                $jenis_pemasukan->save();

                return response()->json([
                    'message' => 'Jenis pemasukan berhasil diupdate!'
                ], 200);
            }

            $dataInsert = JenisPemasukan::create($data);
            if ($dataInsert) {
                return redirect()->to('/jenis_pemasukan')->with('success', 'Jenis pemasukan berhasil ditambah');
            }
        }

        return redirect()->to('/jenis_pemasukan')->with('error', 'Gagal tambah data');
    }

    public function delete(int $id): JsonResponse
    {
        $jenis_pemasukan = JenisPemasukan::query()->find($id)->delete();

        if ($jenis_pemasukan):
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
}

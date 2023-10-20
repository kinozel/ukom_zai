<?php

namespace App\Http\Controllers;

use App\Models\JenisPengeluaran;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class JenisPengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = [
            'jenis_pengeluaran'=> JenisPengeluaran::all(),
        ];

        return view ('jenis_pengeluaran.index', $data);
    }   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'jenis_pengeluaran' => ['required']
        ]);

        // if (JenisPengeluaran::query()->where('jenis_pengeluaran', $request->jenis_pengeluaran)->count('id') ) {
        //     return response()->json([
        //         'message' => "Jenis pengeluaran $request->jenis_pengeluaran already exists."
        //     ], 400);
        // }

        if ($data) {
            if ($request->id !== null) {
                $jenis_pengeluaran = JenisPengeluaran::query()->find($request->id);
                $jenis_pengeluaran->fill($data);
                $jenis_pengeluaran->save();

                return response()->json([
                    'message' => 'Jenis pengeluaran berhasil diupdate!'
                ], 200);
            }

            $dataInsert = JenisPengeluaran::create($data);
            if ($dataInsert) {
                return redirect()->to('/jenis_pengeluaran')->with('success', 'Jenis pengeluaran berhasil ditambah');
            }
        }

        return redirect()->to('/jenis_pengeluaran')->with('error', 'Gagal tambah data');
    }

    public function delete(int $id): JsonResponse
    {
        $jenis_pengeluaran = JenisPengeluaran::query()->find($id)->delete();

        if ($jenis_pengeluaran):
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

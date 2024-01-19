<?php

namespace App\Http\Controllers;
use App\Http\Requests\PemasukanRequest;
use App\Http\Requests\PemasukanEditRequest;
use App\Models\JenisPemasukan;
use Illuminate\Http\JsonResponse;
use App\Models\Pemasukan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'pemasukan' => Pemasukan::with('jenis')->orderByDesc('tanggal_pemasukan')->get(),
            'jenis_masuk' => JenisPemasukan::all(),
            'totalPemasukan' => DB::select('SELECT total_pemasukan() AS total')[0]->total,
        ];

        // return $data;

        return view('pemasukan.index', $data);
    }   

    /**
     * Store a newly created resource in storage.
     */
    public function store(PemasukanRequest $request)
    { {
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

        if ($pemasukan) :
            //Pesan Berhasil
            $pesan = [
                'success' => true,
                'pesan' => 'Data user berhasil dihapus'
            ];
        else :
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

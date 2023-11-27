<?php

namespace App\Http\Controllers;

use App\Http\Requests\PengeluaranEditRequest;
use App\Http\Requests\PengeluaranRequest;
use App\Models\Pengeluaran;
use App\Models\JenisPengeluaran;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'pengeluaran'=> Pengeluaran::with('jenis_pengeluaran')->orderByDesc('tanggal_pengeluaran')->get(),
            'jenis_pengeluaran'=> JenisPengeluaran::all(),
        ];
        return view('pengeluaran.index', $data);
    }

    public function cetakPengeluaran()
    {
        $data = [
            'pengeluaran'=> Pengeluaran::with('jenis_pengeluaran')->orderByDesc('tanggal_pengeluaran')->get(),
            'jenis_pengeluaran'=> JenisPengeluaran::all(),
        ];
        return view('pengeluaran.cetak', $data);
    }

//     public function showTotalPengeluaran()
// {
//     $totalPengeluaran = DB::select('SELECT total_pengeluaran() AS total')[0]->total;
    
//     return view('pengeluaran.index', ['totalPengeluaran' => $totalPengeluaran]);
// }

    public function store(PengeluaranRequest $request)
    {
        {
            $data = $request->validated();
            
            if ($path = $request->file('dokumentasi_pengeluaran')) {
                $path = $path->storePublicly('', 'public');
                $data['dokumentasi_pengeluaran'] = $path;
                // dd($data);
            }

            $pengeluaran = Pengeluaran::query()->create($data);
            
    
            if (!$pengeluaran) {
                return response()->json([
                    'message' => 'Failed create pengeluaran'
                ], 403);
            }
    
            return response()->json([
                'message' => 'Pengeluaran created'
            ], 201);
        }
    }
    public function delete(int $id): JsonResponse
    {
        $pengeluaran = Pengeluaran::query()->find($id)->delete();

        if ($pengeluaran):
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

    public function update(PengeluaranEditRequest $request)
    {
        $data = $request->validated();
        $pengeluaran = Pengeluaran::query()->find($request->id);

        if ($path = $request->file('dokumentasi_pengeluaran')) {
            // Delete old file
            if ($pengeluaran->file) {
                Storage::delete("public/$pengeluaran->file");
            }

            // Store new file
            $path = $path->storePublicly('', 'public');
            $data['dokumentasi_pengeluaran'] = $path;
        }

        $pengeluaran->update($data);

        return [
            'message' => 'Berhasil update pengeluaran!'
        ];
    }

    }

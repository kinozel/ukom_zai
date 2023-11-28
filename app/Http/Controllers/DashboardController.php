<?php

namespace App\Http\Controllers;
use App\Models\Pemasukan;
use App\Models\Log;
use App\Models\log_pengeluaran;
use App\Models\log_user;
use App\Models\Pengeluaran;
use App\Models\JenisPemasukan;
use App\Models\JenisPengeluaran;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $data = [
            'jenis_pemasukan' => JenisPemasukan::query()->count(),
            'pemasukan' => Pemasukan::query()->count(),
            'pemasukaN'=> Pemasukan::with('jenis_pemasukan')->orderByDesc('tanggal_pemasukan')->get(), 
            'pengeluaraN'=> Pengeluaran::with('jenis_pengeluaran')->orderByDesc('tanggal_pengeluaran')->get(),
            'jenis_pengeluaran' => JenisPengeluaran::query()->count(),
            'pengeluaran' => Pengeluaran::query()->count(),
            'log' => Log::query()->count(),
            'log_pengeluaran' => log_pengeluaran::query()->count(),
            'log_user' => log_user::query()->count(),

            'user' => User::query()->count()
        ];

        return view('dashboard.index', $data);
    }
    public function cetakpengeluaran()
    {
        $data = [
            'pengeluaran'=> Pengeluaran::with('jenis_pengeluaran')->orderByDesc('tanggal_pengeluaran')->get(),
            'jenis_pengeluaran'=> JenisPengeluaran::all(),
        ];

        // return $data;

        return view('pengeluaran.cetak', $data);
    } 
}

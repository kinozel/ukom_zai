<?php

namespace App\Http\Controllers;
use App\Models\Pemasukan;
use App\Models\Log;
use App\Models\Pengeluaran;
use App\Models\JenisPemasukan;
use App\Models\JenisPengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {
        $data = [
            'jenis_pemasukan' => JenisPemasukan::query()->count(),
            'pemasukan' => Pemasukan::query()->count(),
            'pemasukaN'=> Pemasukan::with('jenis')->orderByDesc('tanggal_pemasukan')->get(),            
            'jenis_pengeluaran' => JenisPengeluaran::query()->count(),
            'pengeluaran' => Pengeluaran::query()->count(),
            'log' => Log::query()->count(),
            'totalSaldo' => DB::table('total_saldo_view')->value('total_saldo'),

        ];

        return view('dashboard.index', $data);
    }
}

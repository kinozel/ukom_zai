<?php

namespace App\Http\Controllers;
use App\Models\Pemasukan;
use App\Models\Log;
use App\Models\Pengeluaran;
use App\Models\JenisPemasukan;
use App\Models\JenisPengeluaran;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $data = [
            'jenis_pemasukan' => JenisPemasukan::query()->count(),
            'pemasukan' => Pemasukan::query()->count(),
            'jenis_pengeluaran' => JenisPengeluaran::query()->count(),
            'pengeluaran' => Pengeluaran::query()->count(),
            'log' => Log::query()->count(),
        ];

        return view('dashboard.index', $data);
    }
}

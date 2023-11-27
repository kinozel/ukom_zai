<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\log_pengeluaran;
use App\Models\log_user;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class LogController extends Controller
{
    public function index(): View
    {
        $data = [
            'logs' => Log::query()->orderBy('created_at', 'DESC')->get(),
            'logs_pengeluaran' => log_pengeluaran::query()->orderBy('created_at', 'DESC')->get(),
            'logs_user' => log_user::query()->orderBy('created_at', 'DESC')->get()


        ];

        return view('log.index', $data);
    }
}

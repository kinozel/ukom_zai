<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    //
    public function index()
    {
        //
        $data = [
            'user'=> User::all(),
        ];

        return view ('user.index', $data);
    }  
    public function store(UserRequest $request)
    {
        $data = $request->validated();
        
        // Hash password
        $data['password'] = Hash::make($data['password']);
        
        $user = User::create($data);
    
        if (!$user) {
            return response()->json([
                'message' => 'Failed create user'
            ], 403);
        }
    
        return response()->json([
            'message' => 'User created'
        ], 201);
    }
    public function delete(string $username): JsonResponse
    {
        $username = User::query()->find($username)->delete();

        if ($username):
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
    public function update(UserRequest $request, $username)
{
    // Menerima data yang telah divalidasi dari UserRequest
    $validatedData = $request->validated();

    // Temukan pengguna berdasarkan username
    $user = User::where('username', $username)->first();

    if (!$user) {
        return response()->json([
            'message' => 'Pengguna tidak ditemukan',
        ], 404);
    }

    // Periksa apakah ada perubahan data yang akan di-update
    $dataToUpdate = [];
    if (isset($validatedData['username'])) {
        $dataToUpdate['username'] = $validatedData['username'];
    }

    if (isset($validatedData['role'])) {
        $dataToUpdate['role'] = $validatedData['role'];
    }

    // Periksa apakah ada perubahan password yang akan di-update
    if (isset($validatedData['password'])) {
        $dataToUpdate['password'] = Hash::make($validatedData['password']);
    }

    // Update data pengguna jika ada perubahan
    if (count($dataToUpdate) > 0) {
        $user->update($dataToUpdate);
    }

    return response()->json([
        'message' => 'Pengguna berhasil di-update',
        'data' => $user,
    ], 200);
}

}

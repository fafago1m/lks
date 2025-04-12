<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function cekadmin(Request $request)
    {

        if (!$request->user()->hasRole('admin')) {
            return response()->json([
                'status' => 'dilarang',
                'message' => 'Anda bukan administrator'
            ], 403);
        }
        
        $admins = User::role('admin')->get(); 
        
        return response()->json([
            'success' => true,
            'data' => $admins,
        ]);
    }

    public function cekpemain()
    {
        $users = User::role('pemain')->get();

        $konten = $users->map(function ($user) {
            return [
                'nama pengguna' => $user->name,
                'created_at' => $user->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $user->updated_at->format('Y-m-d H:i:s'),
            ];
        });

        return response()->json([
            'totalElemen' => $konten->count(),
            'konten' => $konten,
        ], 200);
    }
}

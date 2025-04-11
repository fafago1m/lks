<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getadmin()
    {
        
        $admin = User::role('admin')->get(); 
        
        return response()->json($admin);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function redirectToDashboard()
    {
        $user = Auth::user();

        switch ($user->role_id) {
            case 1: // admin
                return redirect('/dashboard/admin');
            case 2: // bendahara
                return redirect('/dashboard/bendahara');
            default: // karyawan
                return redirect('/dashboard/karyawan');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Permisos;
use Illuminate\Http\Request;
use DB;

class PermissionController extends Controller
{
    public function index()
    {
        $permisos = DB::table('permissions')
                    ->select(
                        'permissions.*')
                    ->orderByRaw('permissions.name ASC')
                    ->get();

        $titulo = 'Permissions';


        return view ('permissions.index')->with (compact('permisos', 'titulo'));
    }
}

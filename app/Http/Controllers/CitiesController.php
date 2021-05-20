<?php

namespace App\Http\Controllers;

use App\Cities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Funciones;
use DB;

class CitiesController extends Controller
{
    use Funciones;
/*
}
|--------------------------------------------------------------------------
| index
|--------------------------------------------------------------------------
|
*/
    public function index()
    {
        $data = DB::table('cities')
                ->select('cities.*')
                ->where('status', '<>', 3 )
                ->orderByRaw('id ASC')
                ->get(); 

        $titulo = 'Cities';       

        return view('cities.index', compact('data', 'titulo'));
    }


/*
|--------------------------------------------------------------------------
| create
|--------------------------------------------------------------------------
|
*/

    public function create()
    {
        $titulo = 'Cities';

        return view('cities.create', compact('titulo'));
    }


/*
|--------------------------------------------------------------------------
| store
|--------------------------------------------------------------------------
|
*/
    public function store(Request $request)
    {

        $request['user_create'] = Auth::id();
        $data = Cities::create($request->all());

        return redirect ('admin/cities')->with('success', 'Registro creado exitosamente');
    }


/*
|--------------------------------------------------------------------------
| edit
|--------------------------------------------------------------------------
|
*/

    public function edit($id)
    {
        $data = Cities::find($id);

        $titulo = 'Cities';

        return view ('cities.edit')->with (compact('data', 'titulo'));
    }



/*
|--------------------------------------------------------------------------
| update
|--------------------------------------------------------------------------
|
*/
    public function update(Request $request, $id)
    {
        $request['user_update'] = Auth::id();
        $datos = Cities::find($id)->update($request->all());
        
        return redirect ('admin/cities')->with('success', 'Registro actualizado exitosamente');
    }



/*
|--------------------------------------------------------------------------
| destroy
|--------------------------------------------------------------------------
|
*/

    public function destroy($id)
    {
        $data = Cities::find($id);
        $data->status = 3;
        $data->user_update = Auth::id();
        $data->save();
    
        return redirect ('admin/cities');
    }


/*
|--------------------------------------------------------------------------
| Activar publicación
|--------------------------------------------------------------------------
|
*/

    public function active($id)
    {

        $data = Cities::find($id);
        $data->status = 1;
        $data->user_update = Auth::id();
        $data->save();
    
        return redirect ('admin/cities');
    }


/*
|--------------------------------------------------------------------------
| Desactivar publicación
|--------------------------------------------------------------------------
|
*/

    public function inactive($id)
    {
        $data = Cities::find($id);
        $data->status = 2;
        $data->user_update = Auth::id();
        $data->save();

        return redirect ('admin/cities');
    }
}
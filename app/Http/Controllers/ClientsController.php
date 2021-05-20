<?php

namespace App\Http\Controllers;

use App\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Funciones;
use DB;


class ClientsController extends Controller
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
        $data = DB::table('clients')
                ->leftJoin('cities', 'clients.city_id', '=', 'cities.id')
                ->select(
                    'clients.*',
                    'cities.name as name_city',
                    DB::raw('(CASE WHEN clients.status = 1 THEN "Active" ELSE "Inactive" END) AS status_element'))
                ->where('clients.status', '<>', 3 )
                ->orderByRaw('clients.id ASC')
                ->get();
        
        $titulo = 'Clients';

        return view('clients.index', compact('data', 'titulo'));
    }


/*
|--------------------------------------------------------------------------
| create
|--------------------------------------------------------------------------
|
*/

    public function create()
    {

        $cities = DB::table('cities')->select('cities.*')->where('status', 1 )->get();
        $titulo = 'Clients';

        return view('clients.create', compact('titulo', 'cities'));
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
        $data = Clients::create($request->all());

        return redirect ('admin/clients')->with('success', 'Registro creado exitosamente');
    }


/*
|--------------------------------------------------------------------------
| edit
|--------------------------------------------------------------------------
|
*/

    public function edit($id)
    {
        $data = Clients::find($id); 

        $cities = DB::table('cities')->select('cities.*')->where('status', 1 )->get();
  
        $titulo = 'Clients';

        return view ('clients.edit')->with (compact('data', 'titulo', 'cities'));
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
        $datos = Clients::find($id)->update($request->all());

        return redirect ('admin/clients')->with('success', 'Registro actualizado exitosamente');
    }



/*
|--------------------------------------------------------------------------
| Activar publicación
|--------------------------------------------------------------------------
|
*/

    public function active($id)
    {

        $data = Clients::find($id);
        $data->status = 1;
        $data->user_update = Auth::id();
        $data->save();
  
        return redirect ('admin/clients');
    }


/*
|--------------------------------------------------------------------------
| Desactivar publicación
|--------------------------------------------------------------------------
|
*/

    public function inactive($id)
    {       

        $data = Clients::find($id);
        $data->status = 2;
        $data->user_update = Auth::id();
        $data->save();

        return redirect ('admin/clients');
    }

/*
|--------------------------------------------------------------------------
| destroy
|--------------------------------------------------------------------------
|
*/

public function destroy($id)
{
    $data = Clients::find($id);
    $data->status = 3;
    $data->user_update = Auth::id();
    $data->save();

    return redirect ('admin/clients')->with('eliminar', 'ok');
}
}
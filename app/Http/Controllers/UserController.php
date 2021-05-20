<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UsuariosRequest;
use App\Http\Requests\UsuariosUpdateRequest;
use App\Traits\Funciones;
use App\User;
use DB;

class UserController extends Controller
{
    use Funciones; 

/*-- ----------------------------
-- Index
-- ----------------------------*/

    public function index() 
    {

        $data = DB::table('users')
                    ->select('users.*')
                    ->orderByRaw('id ASC')
                    ->get();

        return view ('users.index')->with (compact('data'));
    }


/*-- ----------------------------
-- Create
-- ----------------------------*/

    public function create() 
    {

        $roles = Role::get();

        return view ('users.create')->with (compact('roles'));

    }

/*-- ----------------------------
-- Store
-- ----------------------------*/
    public function store(Request $request) 
    {

    	$user = new User();
        $user->name = $request->input('name');
        $user->last = $request->input('last');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
    	$user->save();

        $user->roles()->sync($request->get('roles'));        

        return redirect ('admin/users')->with('success', 'Successfully created record');
    }


/*-- ----------------------------
-- Edit
-- ----------------------------*/
    public function edit($id) 
    {
        $user = User::find($id);        
        $roles = Role::get();
        $rol_user = DB::table('model_has_roles')
                    ->select('model_has_roles.*')
                    ->where('model_id', '=', $id)
                    ->get();

        return view ('users.edit')->with(compact('user', 'roles', 'rol_user', 'id'));
    }


/*-- ----------------------------
-- Update
-- ----------------------------*/
    public function update(Request $request, $id)
    {

    	$user = User::find($id);
        $user->name = $request->input('name');
        $user->last = $request->input('last');
        $user->email = $request->input('email');
        $user->save();

        $user->roles()->sync($request->get('roles'));        

        return redirect ('admin/users')->with('success', 'Registration successfully updated');
    }



/*-- ----------------------------
-- Destroy
-- ----------------------------*/
    public function destroy($id) 
    {
        $user = User::find($id);
        $user->status = 3;
        $user->save();
        return back();
    }


/*-- ----------------------------
-- Show
-- ----------------------------*/

     public function show() 
    {
        $users = DB::table('users')
            ->select('users.*')
            ->where('users.id', Auth::id())
            ->get();

        return view ('users.show')->with (compact('users'));
    }


/*-- ----------------------------
    -- Edit Perfil
    -- ----------------------------*/
    public function editarperfil($id) 
    {
        if ($id != Auth::id())
        return redirect('perfil');

        $user = User::find($id); 

        return view ('users.editperfil')->with(compact('user'));
    }


/*-- ----------------------------
-- Update Perfil
-- ----------------------------*/
    public function updateperfil(Request $request, $id)
    {      
        if ($id != Auth::id())
        return redirect('perfil');    

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->last = $request->input('last');
        $user->save();        

        return redirect ('admin/perfil')->with('success', 'Profile updated successfully');
    }


/*
|--------------------------------------------------------------------------
| Activar publicación
|--------------------------------------------------------------------------
|
*/

    public function active($id)
    {

        $data = User::find($id);
        $data->status = 1;
        $data->save();
  
        return redirect ('admin/users')->with('success', 'Registration activated successfully');
    }


/*
|--------------------------------------------------------------------------
| Desactivar publicación
|--------------------------------------------------------------------------
|
*/

    public function inactive($id)
    {
        $data = User::find($id);
        $data->status = 2;
        $data->save();

        return redirect ('admin/users')->with('success', 'Registry inactivated successfully');
    }

/*-- ----------------------------
-- Cambio de contraseña
-- ----------------------------*/
    public function pwd(Request $request)
    {

        $user = User::find($request->input('user_id'));
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect ('admin/users')->with('success', 'Password updated successfully');
    }
}

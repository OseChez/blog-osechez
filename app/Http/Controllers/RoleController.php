<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate();
        return view('roles.index',compact('roles'));
    }
   /**
     * Almacena un nuevo objeto rol.
     *
     * @return Caffeinated\Shinobi\Models\Role
     */
   public function create(){
      return view('roles.create');
   }
   /**
     * Almacena un nuevo objeto rol.
     *
     * @return Caffeinated\Shinobi\Models\Role
     */
   public function store(Request $request, Role $role){
      $role->save($request->all());
       return redirect()->route('roles.index')
                        ->with('info','Rol creado éxitosamente');
   }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('roles.show',compact('role'));
    }
    /**
     * Edit the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role
     * @return \Illuminate\Http\Response
     */
     public function edit(Role $role)
    {
       $permissions=Permission::get();
       return view('roles.edit',compact('role','permissions'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Role $role)
    {
       $role->update($request->all());
       $role->permissions()->sync($request->get('permissions'));
       return redirect()->route('roles.edit',$role->id)
                        ->with('info','Rol actualizado éxitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return back()->with('info','Eliminado éxitosamente');
    }
}

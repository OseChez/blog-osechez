<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Role;
use App\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate();
        return view('users.index',compact('users'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,User $user)
    {
        //$value = $request->session()->get('key');
        $data = $request->session()->all();
      //if($request->session()->has('users'))
       // dd($request->session());
        return view('users.show',compact('user'));
    }
    /**
     * Edit the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User
     * @return \Illuminate\Http\Response
     */
     public function edit(User $user)
    {
        $roles = Role::get();
        return view('users.edit',compact('user','roles'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
       $user->update($request->all());

       $user->roles()->sync($request->get('roles'));
       return redirect()->route('users.edit',$user->id)
                        ->with('info','Usuario actualizado éxitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('info','Eliminado éxitosamente');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::orderBy('code','asc')->with('permissions')->get();
        return response()->json($roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            "code"=>"required|unique:roles",
            "libelle"=>"required|unique:roles",
    ]);

    $roles = new Role();
    $roles->code = $request->code;
    $roles->libelle = $request->libelle;
   
    $roles->save();

    foreach ($request->permissions as $permission) {
        // $permissions = new Permission();
        // $permissions->name = $permission;
        // $permissions->slug = strtolower(str_replace(" ", "-", $permission));
        // $permissions->save();
        $roles->permissions()->attach($permission);
        $roles->save();
    }

    return response()->json($roles);
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $roles = Role::find($id);
        return response()->json($roles);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $roles = Role::find($id);
        $roles->code = $request->code;
        $roles->libelle = $request->libelle;
        
        $roles->save();

       // $roles->permissions()->delete();
        $roles->permissions()->detach();
        foreach ($request->permissions as $permission) {

            $roles->permissions()->attach($permission);
            $roles->save();
        }
        return $this->show($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $roles = Role::find($id);
        $roles->delete();
        return $this->index();
    }
}

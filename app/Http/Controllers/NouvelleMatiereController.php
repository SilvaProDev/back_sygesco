<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NouvelleMatiere;

class NouvelleMatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = NouvelleMatiere::all();
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
            "code"=>"required|unique:nouvelle_matieres",
            "libelle"=>"required|unique:nouvelle_matieres",
    ]);

    $roles = new NouvelleMatiere();
    $roles->code = $request->code;
    $roles->libelle = $request->libelle;
   
    $roles->save();
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
        $roles = NouvelleMatiere::find($id);
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
        $roles = NouvelleMatiere::find($id);
        $roles->code = $request->code;
        $roles->libelle = $request->libelle;
        
        $roles->update();
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
        $roles = NouvelleMatiere::find($id);
        $roles->delete();
        return $this->index();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classe;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $classe = Classe::all();
        return response()->json($classe);
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
            "code"=>"required",
            "libelle"=>"required|unique:classes",
            "niveau_id"=>"required",
        ]);

        $classe = new Classe();
        $classe->code =$request->code;
        $classe->libelle =$request->libelle;
        $classe->niveau_id =$request->niveau_id;

        $classe->save();
        return response()->json($classe);


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
        $classe = Classe::find($id);
        return response()->json($classe);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       

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
         // Contrainte sur les champs
         $validate = $request->validate([
            "code"=>"required",
            "libelle"=>"required",
            "niveau_id"=>"required",
        ]);

        $classe = Classe::find($id);
        $classe->code = $request->code;
        $classe->libelle = $request->libelle;
        $classe->niveau_id = $request->niveau_id;
        $classe->update();
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
        $classe = Classe::find($id);
        $classe->delete();
        return $this->index();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matiere;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $matiere = Matiere::all();
        return response()->json($matiere);
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
            "niveau_id"=>"required",
            "nouvelle_matiere_id"=>"required",
            "coefficient"=>"required",
            "classe_id"=>"required",
            ]);

            $matiere = new Matiere();
            $matiere->niveau_id = $request->niveau_id;
            $matiere->classe_id = $request->classe_id;
            $matiere->statut = $request->statut;
            $matiere->nouvelle_matiere_id = $request->nouvelle_matiere_id;
            $matiere->coefficient = $request->coefficient;
            $matiere->serie = $request->serie;
           
            $matiere->save();
            return response()->json($matiere);
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
        $matiere = Matiere::find($id);
        return response()->json($matiere);
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
        $validate = $request->validate([
            "niveau_id"=>"required",
            "nouvelle_matiere_id"=>"required",
            "coefficient"=>"required",
            ]);
        $matiere = Matiere::find($id);
        $matiere->niveau_id = $request->niveau_id;
        $matiere->classe_id = $request->classe_id;
        $matiere->statut = $request->statut;
        $matiere->nouvelle_matiere_id = $request->nouvelle_matiere_id;
        $matiere->coefficient = $request->coefficient;
        $matiere->serie = $request->serie;
        
        $matiere->update();
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
        $matiere = Matiere::find($id);
        $matiere->delete();
        return $this->index();
    }
}

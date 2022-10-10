<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Semestre;
class SemestreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $smestre = Semestre::all();
        return response()->json($smestre);
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
            "annee_id"=>"required",
            "libelle"=>"required|unique:semestres",
            "date_debut"=>"required",
            "date_fin"=>"required",
        ]);
        $semestre = new Semestre();
        $semestre->annee_id = $request->annee_id;
        $semestre->libelle = $request->libelle;
        $semestre->date_debut = $request->date_debut;
        $semestre->date_fin = $request->date_fin;
        $semestre->encours = $request->encours;

        $semestre->save();
        return response()->json($semestre);
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
        $semestre = Semestre::find($id);
        return response()->json($semestre);
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
            "annee_id"=>"required",
            "libelle"=>"required",
            "date_debut"=>"required",
            "date_fin"=>"required",
        ]);
        $semestre = Semestre::find($id);
        $semestre->annee_id = $request->annee_id;
        $semestre->libelle = $request->libelle;
        $semestre->date_debut = $request->date_debut;
        $semestre->date_fin = $request->date_fin;
        $semestre->encours = $request->encours;

        $semestre->update();
        return response()->json($semestre);
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
        $semestre = Semestre::find($id);
        $semestre->delete();
        return $this->index();
    }

    public function Semestre_Encours(Request $request, $id){

        $semestre_encours = Semestre::find($id);
        $semestre_encours->annee_id = $request->annee_id;
        $semestre_encours->libelle = $request->libelle;
        $semestre_encours->date_debut = $request->date_debut;
        $semestre_encours->date_fin = $request->date_fin;
        $semestre_encours->encours = 1;
        $semestre_encours->update();

        $modif_value = Semestre::where('id', '!=', $semestre_encours->id)->get();
        foreach ($modif_value as $value) {
           $modif = Semestre::find($value->id);
           $modif->encours = 0;
           $modif->save();
        }

        return response()->json(Semestre::all());

    }
}

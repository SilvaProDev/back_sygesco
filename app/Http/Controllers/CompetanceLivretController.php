<?php

namespace App\Http\Controllers;
use App\Models\CompetanceLivret;
use Illuminate\Http\Request;

class CompetanceLivretController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $liste = CompetanceLivret::all();
        return response()->json($liste);
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
           
            "libelle_id"=>"required",
            "livret_id"=>"required",
            
        ]);

        $livret = new CompetanceLivret();
       
        $livret->libelle_id =$request->libelle_id;
        $livret->livret_id =$request->livret_id;
        $livret->annee_id =$request->annee_id;
        $livret->trimestre_id =$request->trimestre_id;
        $livret->matiere_id =$request->matiere_id;
        $livret->classe_id =$request->classe_id;
        $livret->niveau_id =$request->niveau_id;
        $livret->date =$request->date;
        $livret->note =$request->note;
        $livret->eleve_id =$request->eleve_id;
      

        $livret->save();
        return response()->json($livret);
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
        $livret = CompetanceLivret::find($id);
        return response()->json($livret);
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
           
            "libelle_id"=>"required",
            "livret_id"=>"required",
            
        ]);

        $livret = CompetanceLivret::find($id);
       
        $livret->libelle_id =$request->libelle_id;
        $livret->livret_id =$request->livret_id;
        $livret->annee_id =$request->annee_id;
        $livret->trimestre_id =$request->trimestre_id;
        $livret->matiere_id =$request->matiere_id;
        $livret->classe_id =$request->classe_id;
        $livret->niveau_id =$request->niveau_id;
        $livret->date =$request->date;
        $livret->note =$request->note;
        $livret->eleve_id =$request->eleve_id;
      

        $livret->update();
        return response()->json($livret);
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
        $livret = CompetanceLivret::find($id);
        $livret->delete();
        return $this->index();
    }
}

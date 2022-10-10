<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BilanAnnuel;

class BilanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $classe = BilanAnnuel::all();
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
        // $validate = $request->validate([
        //     "code"=>"required",
        //     "libelle"=>"required|unique:classes",
        //     "niveau_id"=>"required",
        // ]);

        $classe = new BilanAnnuel();
        $classe->titre =$request->titre;
        $classe->annee =$request->annee;
        $classe->niveau =$request->niveau;

        $classe->candidat_inscrit =$request->candidat_inscrit;
        $classe->garcon_inscrit =$request->garcon_inscrit;
        $classe->fille_inscrit =$request->fille_inscrit;

        $classe->candidat_present =$request->candidat_present;
        $classe->garcon_present =$request->garcon_present;
        $classe->fille_present =$request->fille_present;

        $classe->candidat_absent =$request->candidat_absent;
        $classe->garcon_absent =$request->garcon_absent;
        $classe->fille_absent =$request->fille_absent;

        $classe->candidat_admis =$request->candidat_admis;
        $classe->garcon_admis =$request->garcon_admis;
        $classe->fille_admis =$request->fille_admis;

        $classe->taux_candidat =$request->taux_candidat;
        $classe->taux_garcon =$request->taux_garcon;
        $classe->taux_fille =$request->taux_fille;

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
        $classe = BilanAnnuel::find($id);
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
        //  $validate = $request->validate([
        //     "code"=>"required",
        //     "libelle"=>"required",
        //     "niveau_id"=>"required",
        // ]);

        $classe = BilanAnnuel::find($id);
        $classe->niveau =$request->niveau;
        $classe->titre =$request->titre;
        $classe->annee =$request->annee;

        $classe->candidat_inscrit =$request->candidat_inscrit;
        $classe->garcon_inscrit =$request->garcon_inscrit;
        $classe->fille_inscrit =$request->fille_inscrit;

        $classe->candidat_present =$request->candidat_present;
        $classe->garcon_present =$request->garcon_present;
        $classe->fille_present =$request->fille_present;

        $classe->candidat_absent =$request->candidat_absent;
        $classe->garcon_absent =$request->garcon_absent;
        $classe->fille_absent =$request->fille_absent;

        $classe->candidat_admis =$request->candidat_admis;
        $classe->garcon_admis =$request->garcon_admis;
        $classe->fille_admis =$request->fille_admis;

        $classe->taux_candidat =$request->taux_candidat;
        $classe->taux_garcon =$request->taux_garcon;
        $classe->taux_fille =$request->taux_fille;

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
        $classe = BilanAnnuel::find($id);
        $classe->delete();
        return $this->index();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scolarite;
class ScolariteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $scolarite = Scolarite::all();
        return response()->json($scolarite);
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
            "date"=>"required",
            "montant"=>"required",
            "classe_id"=>"required",
            "niveau_id"=>"required",
            "student_id"=>"required",
            "annee_id"=>"required",
        ]);
        $scolarite = new Scolarite();
        $scolarite->date = $request->date;
        $scolarite->montant = $request->montant;
        $scolarite->classe_id = $request->classe_id;
        $scolarite->student_id = $request->student_id;
        $scolarite->annee_id = $request->annee_id;
        $scolarite->niveau_id = $request->niveau_id;

        $scolarite->save();
        return response()->json($scolarite);
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
        $scolarite = Scolarite::find($id);
        return response()->json($scolarite);
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
            "date"=>"required",
            "montant"=>"required",
            "classe_id"=>"required",
            "niveau_id"=>"required",
            "student_id"=>"required",
            "annee_id"=>"required",
        ]);
        $scolarite = Scolarite::find($id);
        $scolarite->date = $request->date;
        $scolarite->montant = $request->montant;
        $scolarite->classe_id = $request->classe_id;
        $scolarite->student_id = $request->student_id;
        $scolarite->annee_id = $request->annee_id;
        $scolarite->niveau_id = $request->niveau_id;

        $scolarite->update();
        return response()->json($scolarite);
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
        $scolarite = Scolarite::find($id);
        $scolarite->delete();
        return $this->index();
    }
}

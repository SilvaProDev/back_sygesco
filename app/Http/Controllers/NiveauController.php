<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Niveau;

class NiveauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $niveau = Niveau::all();
        return response()->json($niveau);
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
                "code"=>"required|unique:niveaux",
                "libelle"=>"required|unique:niveaux",
        ]);

        $niveau = new Niveau();
        $niveau->code = $request->code;
        $niveau->libelle = $request->libelle;
        $niveau->scolarite = $request->scolarite;
        $niveau->save();
        return response()->json($niveau);
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
        $niveau = Niveau::find($id);
        return response()->json($niveau);
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
        $niveau = Niveau::find($id);
        $niveau->code = $request->code;
        $niveau->libelle = $request->libelle;
        $niveau->scolarite = $request->scolarite;
        $niveau->update();
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
        $niveau = Niveau::find($id);
        $niveau->delete();
        return $this->index();
    }
}

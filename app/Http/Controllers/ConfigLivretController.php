<?php

namespace App\Http\Controllers;
use App\Models\ConfigLivret;
use Illuminate\Http\Request;

class ConfigLivretController  extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $livret = ConfigLivret::all();
        return response()->json($livret);
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
           
            "libelle"=>"required",
            "livret_id"=>"required",
            
        ]);

        $livret = new ConfigLivret();
       
        $livret->libelle =$request->libelle;
        $livret->livret_id =$request->livret_id;
      

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
           $livret = ConfigLivret::find($id);
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
          // Contrainte sur les champs
          $validate = $request->validate([
         
            "libelle"=>"required",
         
        ]);

        $livret = ConfigLivret::find($id);
       
        $livret->libelle = $request->libelle;
        $livret->livret_id = $request->livret_id;
      
        $livret->update();
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
          //
          $livret = ConfigLivret::find($id);
          $livret->delete();
          return $this->index();
    }
}

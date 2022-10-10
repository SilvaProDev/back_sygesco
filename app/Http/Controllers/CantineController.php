<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cantine;

class CantineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cantine = Cantine::all();
        return response()->json($cantine);
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
        
        $validate = $request->validate([
            "date"=>"required",
            "montant"=>"required",
            "niveau_id"=>"required",
            "classe_id"=>"required",
        ]);
        foreach ($request->tableau as $value) {
           
            $cant = new Cantine();
            $cant->semestre =$request->trimestre;
            $cant->date =$request->date;
            $cant->montant =$request->montant;
            $cant->niveau_id =$request->niveau_id;
            $cant->classe_id =$request->classe_id;
            $cant->student_id =$value;
    
            $cant->save();
        }
        return response()->json($cant);
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
        $cant = Cantine::find($id);
        return response()->json($cant);
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
            "niveau_id"=>"required",
            "classe_id"=>"required",
        ]);

        $classe = Cantine::find($id);
        $cant->semestre =$request->trimestre;
        $cant->date =$request->date;
        $cant->montant =$request->montant;
        $cant->niveau_id =$request->niveau_id;
        $cant->classe_id =$request->classe_id;
        $cant->student_id =$value;
        $cant->update();
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
        $cant = Cantine::find($id);
        $cant->delete();
        return $this->index();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Affectation;
class AffectationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $affectations = Affectation::all();
        return response()->json($affectations);
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
            "matiere_id"=>"required",
            "teacher_id"=>"required",
            "niveau_id"=>"required",
        ]);
        foreach ($request->matiere_id as $value) {
           
            $affect = new Affectation();
            $affect->annee_id =$request->annee_id;
            $affect->trimestre_id =$request->trimestre_id;
            $affect->matiere_id =$value;
            $affect->teacher_id =$request->teacher_id;
            $affect->classe_id =$request->classe_id;
            $affect->niveau_id =$request->niveau_id;    
            $affect->save();
        }
   
           return response()->json($affect);
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
        $affect = Affectation::find($id);
        return response()->json($affect);
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
    public function update(Request $request)
    {
        //
        $validate = $request->validate([
            "annee_id"=>"required",
            "matiere_id"=>"required",
            "teacher_id"=>"required",
            "niveau_id"=>"required",
        ]);
                
        $affect = Affectation::where('teacher_id',$request->get('teacher_id'));
        $affect->delete();
      //  $data = explode(',', $request->matiere_id);
    //    print_r($data);
        foreach ($request->matiere_id as $value) {
                $affect = new Affectation();
                $affect->annee_id =$request->annee_id;
                $affect->trimestre_id =$request->trimestre_id;
                $affect->matiere_id =$value;
                $affect->teacher_id =$request->teacher_id;
                $affect->classe_id =$request->classe_id;
                $affect->niveau_id =$request->niveau_id;       
                $affect->save();
            }      
            
   
            return $this->show($request->get('id'));
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
        $affect = Affectation::find($id);
        $affect->delete();
        return $this->index();
    }
}

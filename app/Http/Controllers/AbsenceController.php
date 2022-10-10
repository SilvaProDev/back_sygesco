<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absence;

class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $abscen = Absence::all();
        return response()->json($abscen);
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
            "matiere_id"=>"required",
            "student_id"=>"required",
            "motif"=>"required",
        ]);
                
            $abscen = new Absence();
            $abscen->trimestre_id =$request->trimestre_id;
            $abscen->date =$request->date;
            $abscen->matiere_id =$request->matiere_id;
            $abscen->student_id =$request->student_id;
            $abscen->motif =$request->motif;
           
    
            $abscen->save();
   
        return response()->json($abscen);
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
        $absenc = Absence::find($id);
        return response()->json($absenc);
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
            "matiere_id"=>"required",
            "student_id"=>"required",
            "motif"=>"required",
        ]);
                
            $abscen = Absence::find($id);
            $abscen->trimestre_id =$request->trimestre_id;
            $abscen->date =$request->date;
            $abscen->matiere_id =$request->matiere_id;
            $abscen->student_id =$request->student_id;
            $abscen->motif =$request->motif;
           
    
            $abscen->update();
   
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
        $abscen = Absence::find($id);
        $abscen->delete();
        return $this->index();
    }
}

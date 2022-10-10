<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Moyenne;
use App\Models\MoyenneTrimestrielle;
use App\Models\Student;
class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $note = Note::all();
        return response()->json($note);
    }

    public function moyennes()
    {
        //
        $moy = Moyenne::all();
        return response()->json($moy);
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
            "trimestre_id"=>"required",
            "classe_id"=>"required",
            "note"=>"required",
            "student_id"=>"required",
            "matiere_id"=>"required",
        ]);
        $note = new Note();
        $note->trimestre_id = $request->trimestre_id;
        $note->note = $request->note;
        $note->date = $request->date;
        $note->statut = $request->statut;
        $note->student_id = $request->student_id;
        $note->matiere_id = $request->matiere_id;
        $note->classe_id = $request->classe_id;
        $note->niveau_id = $request->niveau_id;

         $note->save();
        //return response()->json($note);
        $data = Moyenne::where('student_id', $request->student_id)->where('matiere_id',  $request->matiere_id)->first();
        $moyennes = MoyenneTrimestrielle::where('student_id', $request->student_id)->first();

        if($data){
           
            $data->update([
                'moyenne'=> $request->moyenne,
                'moy_annuelle'=> $request->moy_annuelle,
                'coefficient'=> $request->coeff,
                'taille'=> $request->taille,
                'total'=> $request->total,
                'student_id'=> $request->student_id,
                'matiere_id'=> $request->matiere_id,
                'classe_id'=> $request->classe_id,
                'niveau_id'=> $request->niveau_id,
                'statut'=> $request->statut,
                'trimestre_id'=> $request->trimestre_id,
            ]);

        }else{

            $moy = new Moyenne();
            $moy->trimestre_id = $request->trimestre_id;
            $moy->statut = $request->statut;
            $moy->student_id = $request->student_id;
            $moy->matiere_id = $request->matiere_id;
            $moy->classe_id = $request->classe_id;
            $moy->niveau_id = $request->niveau_id;
            $moy->moyenne = $request->moyenne;
            $moy->moy_annuelle = number_format($request->moy_annuelle, 2, '.', ',');
            $moy->coefficient = $request->coeff;
            $moy->taille = $request->taille;
            $moy->total = $request->total;
    
            $moy->save();
        }

        if($moyennes){
           
            $moyennes->update([
              
                'moyenne'=> $request->moy_annuelle, 
                'student_id'=> $request->student_id,
               
                'classe_id'=> $request->classe_id,
                'niveau_id'=> $request->niveau_id,
                'statut'=> $request->statut,
                'trimestre_id'=> $request->trimestre_id,
            ]);

        }else{

            $moy = new MoyenneTrimestrielle();
            $moy->trimestre_id = $request->trimestre_id;
            $moy->statut = $request->statut;
            $moy->student_id = $request->student_id;
           
            $moy->classe_id = $request->classe_id;
            $moy->niveau_id = $request->niveau_id;
            $moy->moyenne = $request->moy_annuelle;
    
            $moy->save();
        }
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
        $semestre = Note::find($id);
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
            "date"=>"required",
            "trimestre_id"=>"required",
            "classe_id"=>"required",
            "note"=>"required",
            "student_id"=>"required",
            "matiere_id"=>"required",
        ]);
        $note = Note::find($id);
        $note->trimestre_id = $request->trimestre_id;
        $note->note = $request->note;
        $note->date = $request->date;
        $note->student_id = $request->student_id;
        $note->matiere_id = $request->matiere_id;
        $note->classe_id = $request->classe_id;
        $note->niveau_id = $request->niveau_id;

        $note->update();
        return response()->json($note);
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
        $semestre = Note::find($id);
        $semestre->delete();
        return $this->index();
    }
}

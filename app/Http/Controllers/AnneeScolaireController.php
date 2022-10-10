<?php

namespace App\Http\Controllers;
use App\Models\AnneeScolaire;
use Illuminate\Http\Request;

class AnneeScolaireController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api', ['except' => ['login']]);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $annee = AnneeScolaire::orderBy('debut_annee', 'asc')->get();
        return response()->json($annee);
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
            "debut_annee"=>"required",
            "fin_annee"=>"required",
            "date_debut"=>"required",
            "date_fin"=>"required",
        ]);
        $anne = new AnneeScolaire();
        $anne->debut_annee = $request->debut_annee;
        $anne->fin_annee = $request->fin_annee;
        $anne->date_debut = $request->date_debut;
        $anne->date_fin = $request->date_fin;
        $anne->encours = $request->encours;

        $anne->save();
        return response()->json($anne);
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
        $anne = AnneeScolaire::find($id);
        return response()->json($anne);
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
        $anne = AnneeScolaire::find($id);
        $anne->debut_annee = $request->debut_annee;
        $anne->fin_annee = $request->fin_annee;
        $anne->date_debut = $request->date_debut;
        $anne->date_fin = $request->date_fin;
        $anne->encours = $request->encours;

        $anne->update();
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
        $anne = AnneeScolaire::find($id);
        $anne->delete();
        return $this->index();
    }

    public function Encours(Request $request, $id){

        $annee_encours = AnneeScolaire::find($id);
        $annee_encours->debut_annee = $request->debut_annee;
        $annee_encours->fin_annee = $request->fin_annee;
        $annee_encours->date_debut = $request->date_debut;
        $annee_encours->date_fin = $request->date_fin;
        $annee_encours->encours = 1;
        $annee_encours->update();

        $modif_value = AnneeScolaire::where('id', '!=', $annee_encours->id)->get();
        foreach ($modif_value as $value) {
           $modif = AnneeScolaire::find($value->id);
           $modif->encours = 0;
           $modif->save();
        }

        return response()->json(AnneeScolaire::all());

    }
}

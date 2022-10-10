<?php

namespace App\Http\Controllers;
use App\Models\Semestre;
use App\Models\Transport;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $transp = Transport::all();
        return response()->json($transp);
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
        if ($request->paye_par_annee =='OUI') {
            $semestre = Semestre::all();
           foreach ($semestre as $value) {
            $transp = new Transport();
            $transp->annee_id = $request->annee_id;
            $transp->classe_id = $request->classe_id;
            $transp->student_id = $request->student_id;
            $transp->niveau_id = $request->niveau_id;
            $transp->trimestre_id = $value->id;
            $transp->montant = $request->montant;
            $transp->paye_par_annee = $request->paye_par_annee;
    
            $transp->save();
           }
           return response()->json($transp);
        } else{

            $transp = new Transport();
            $transp->annee_id = $request->annee_id;
            $transp->classe_id = $request->classe_id;
            $transp->student_id = $request->student_id;
            $transp->niveau_id = $request->niveau_id;
            $transp->trimestre_id = $request->trimestre_id;
            $transp->montant = $request->montant;
            $transp->paye_par_annee = $request->paye_par_annee;
    
            $transp->save();
            return response()->json($transp);
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
        $transp = Transport::find($id);
        return response()->json($transp);
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
        $transp = Transport::find($id);
        $transp->delete();
        return $this->index();
    }
}

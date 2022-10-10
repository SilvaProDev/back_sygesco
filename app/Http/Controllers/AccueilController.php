<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accueil;
class AccueilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $accueil = Accueil::latest()->get();
        return response()->json($accueil);
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
            "titre"=>"required",
            "texte"=>"required",
            
        ]);

        if($request->hasFile('file')){
            $fullName = $request->file('file')->getClientOriginalName();
            $name = pathinfo($fullName, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $nameToStore = $name.'_'.time().'.'.$extension;
            $destination = 'public/accueil_image';
            $delete = $request->file('file')->move($destination, $nameToStore);
            $image = url('public/accueil_image').'/'.$nameToStore;
        }
        else{
            $image ="vide";
        }
                
            $accueil = new Accueil();
            $accueil->titre =$request->titre;
            $accueil->texte =$request->texte;
            $accueil->actived =1;
            $accueil->photo =$image;
           
            $accueil->save();
   
        return response()->json($accueil);
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
        
      
        $accueil = Accueil::find($request->get('id'));
    
        if ($request->hasFile('fichier')) {
            $fullName = $request->file('fichier')->getClientOriginalName();
            $name = pathinfo($fullName, PATHINFO_FILENAME);
            $extension = $request->file('fichier')->getClientOriginalExtension();
            $nameTosore = $name . '_!' . time() . '.' . $extension;
            $destination = public_path('public/accueil_image');
            $fichier = $request->file('fichier')->move($destination, $nameTosore);
            $fichier = url('public/accueil_image') . '/' . $nameTosore;
            
        }
     
       
       
        $accueil->photo = $fichier;
        $accueil->titre =$request->get('titre');
        $accueil->texte =$request->get('texte');
        $accueil->actived =1;
       
        $accueil->save();

    return response()->json($accueil);
  
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
        $accuiel = Accueil::find($id);
        $accuiel->delete();
        return $this->index();
    }
}

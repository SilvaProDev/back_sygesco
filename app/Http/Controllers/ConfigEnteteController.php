<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConfigEntete;
use File;
class ConfigEnteteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $entete = ConfigEntete::all();
        return response()->json($entete);
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
            "nom"=>"required",
            "contact"=>"required",
            "email"=>"required",
            "statut"=>"required",
            "code"=>"required",
            "site"=>"required",
            "slogan"=>"required",
            "adresse"=>"required",
           
        ]);
        if($request->hasFile('file')){
            $fullName = $request->file('file')->getClientOriginalName();
            $name = pathinfo($fullName, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $nameToStore = $name.'_'.time().'.'.$extension;
            $destination = 'public/config_entete';
            $delete = $request->file('file')->move($destination, $nameToStore);
            $logo = url('public/config_entete').'/'.$nameToStore;
        }
        else{
            $logo ="vide";
        }

        $entete = new ConfigEntete();
        $entete->nom =$request->nom;
        $entete->slogan =$request->slogan;
        $entete->email =$request->email;
        $entete->code =$request->code;
        $entete->statut =$request->statut;
        $entete->adresse =$request->adresse;
        $entete->contact =$request->contact;
        $entete->site =$request->site;
        $entete->photo =$logo;

        $entete->save();
        return response()->json($entete);

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
        $entete = ConfigEntete::find($request->get('id'));

        if ($request->hasFile('fichier')) {
            $fullName = $request->file('fichier')->getClientOriginalName();
            $name = pathinfo($fullName, PATHINFO_FILENAME);
            $extension = $request->file('fichier')->getClientOriginalExtension();
            $nameTosore = $name . '_!' . time() . '.' . $extension;
            $destination = public_path('public/config_entete');
            $fichier = $request->file('fichier')->move($destination, $nameTosore);
            $fichier = url('public/config_entete') . '/' . $nameTosore;
            
        }
        else{
            $fichier ="vide";
        }

        $entete->nom =$request->get('nom');
        $entete->slogan =$request->get('slogan');
        $entete->email =$request->get('email');
        $entete->code =$request->get('code');
        $entete->statut =$request->get('statut');
        $entete->adresse =$request->get('adresse');
        $entete->contact =$request->get('contact');
        $entete->site =$request->get('site');
        $entete->photo =$fichier;

        $entete->save();
        return response()->json($entete);
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
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\sendEmail;
use App\Models\Student;
use App\Models\SendMail;
use Illuminate\Support\Facades\Mail;
class SendMailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('email.emailparent');
    }
    public function AllEmail()
    {
        //
        $email = SendEmail::first()->get();
        return response()->json($email);
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
        $emailParent = Student::all();

        if ($request->hasFile('fichier')) {
            $fullName = $request->file('fichier')->getClientOriginalName();
            $name = pathinfo($fullName, PATHINFO_FILENAME);
            $extension = $request->file('fichier')->getClientOriginalExtension();
            $nameTosore = $name . '_!' . time() . '.' . $extension;
            $destination = public_path('public/fichier');
            $fichier = $request->file('fichier')->move($destination, $nameTosore);
            $fichier = public_path('public/fichier') . '/' . $nameTosore;
            
        }else{
            $fichier = "vide";
        }
        $tableau = Array("sujet"=> $request->sujet, "message"=>$request->message, 
        "fichier"=>$request->file('fichier'), "fileUrl"=> $fichier);

        $data = new SendMail();
        $data->annee_id = $request->annee_id;
        $data->fichier = $fichier;
        $data->classe_id = $request->classe_id;
        $data->niveau_id = $request->niveau_id;
        $data->date = $request->date;
        $data->sujet = $request->sujet;
        $data->message = $request->message;
        $data->save();

        foreach($emailParent as $value) {
            if($value->classe_id == $request->classe_id){

                Mail::to($value->email)->send(new sendEmail($tableau));
            }
        }
    }

    public function UniqueEmail(Request $request)
    {
        // pas utilisé
        $emailParent = Student::all();

        if ($request->hasFile('fichier')) {
            $fullName = $request->file('fichier')->getClientOriginalName();
            $name = pathinfo($fullName, PATHINFO_FILENAME);
            $extension = $request->file('fichier')->getClientOriginalExtension();
            $nameTosore = $name . '_!' . time() . '.' . $extension;
            $destination = public_path('public/fichier');
            $fichier = $request->file('fichier')->move($destination, $nameTosore);
            $fichier = public_path('public/fichier') . '/' . $nameTosore;
            // $fichier = \Storage::disk('public')->put('fichier',$nameTosore);
                      
        }else{
            $fichier = "vide";
        }
        
        $tableau = Array("sujet"=> $request->sujet, "message"=>$request->message, 
                         "fichier"=>$request->file('fichier'), "fileUrl"=> $fichier, "nom"=>$nameTosore);
     //   print_r($tableau);
        $data = new SendMail();
        $data->fichier = $fichier;
        $data->annee_id = $request->annee_id;
        $data->classe_id = $request->classe_id;
        $data->niveau_id = $request->niveau_id;
        $data->student_id = $request->student_id;
        $data->date = $request->date;
        $data->sujet = $request->sujet;
        $data->message = $request->message;
        $data->save();
        
        foreach($emailParent as $value) {
        if($value->id == $request->student_id){

            Mail::to($value->email)->send(new sendEmail($tableau));
        }
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
    }
}

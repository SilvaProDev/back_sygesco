<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Yajra\DataTables\Facades\DataTables;

use Carbon\Carbon;
use DB;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $student = Student::all();
        return response()->json($student);
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
            "prenom"=>"required",
            "sexe"=>"required",
            "date_naissance"=>"required",
            "matricule"=>"required",
            "niveau_id"=>"required",
            // "classe"=>"required",
            "oriente"=>"required",
            // "scolarite"=>"required",
            "adresse"=>"required",
            "nationalite"=>"required",
            "nom_pere"=>"required",
            "contact_pere"=>"required",
            "nom_mere"=>"required",
          //  "nom_tuteur"=>"required",
       //     "contact_tuteur"=>"required",
            "email"=>"required",
            // "photo"=>"required|mimes:jpg.jpeg,png",
        ]);

        if($request->hasFile('file')){
            $fullName = $request->file('file')->getClientOriginalName();
            $name = pathinfo($fullName, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $nameToStore = $name.'_'.time().'.'.$extension;
            $destination = 'public/student_image_profile';
            $delete = $request->file('file')->move($destination, $nameToStore);
            $student_image = url('public/student_image_profile').'/'.$nameToStore;
        }
        else{
            $student_image ="vide";
        }

            $student = new Student();
            $student->photo = $student_image;
            $student->droit = $request->droit;
            $student->nom = $request->nom;
            $student->redoublant = $request->redoublant;
            $student->regime = $request->regime;
            $student->interime = $request->interime;
            $student->lieu_naissance = $request->lieu_naissance;
            $student->prenom = $request->prenom;
            $student->sexe = $request->sexe;
            $student->date_naissance = $request->date_naissance;
            $student->matricule = $request->matricule;
            $student->nationalite = $request->nationalite;
            $student->niveau_id = $request->niveau_id;
            $student->classe_id = $request->classe_id;
            $student->scolarite = $request->scolarite;
            $student->oriente = $request->oriente;
            $student->email = $request->email;
            $student->adresse = $request->adresse;
            $student->maladie = $request->maladie;
            $student->transport = $request->transport;
            $student->cantine = $request->cantine;
            $student->nom_pere = $request->nom_pere;
            $student->contact_pere = $request->contact_pere;
            $student->nom_mere = $request->nom_mere;
            $student->contact_mere = $request->contact_mere;
            $student->nom_tuteur = $request->nom_tuteur;
            $student->contact_tuteur = $request->contact_tuteur;
            $student->autre = $request->autre;
            $student->annee_id = $request->annee_id;
    
            $student->save();
    
            return response()->json($student);
        
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
        $student = Student::find($id);
        return response()->json($student);
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
        // $validate = $request->validate([
        //     "nom"=>"required",
        //     "prenom"=>"required",
        //     "sexe"=>"required",
        //     "date_naissance"=>"required",
        //     "matricule"=>"required",
        //     "niveau_id"=>"required",
        //     "classe_id"=>"required",
        //     "oriente"=>"required",
        //     "scolarite"=>"required",
        //     "adresse"=>"required",
        //     "nationalite"=>"required",
        //     "nom_pere"=>"required",
        //     "contact_pere"=>"required",
        //     "nom_mere"=>"required",
        //     "nom_tuteur"=>"required",
        //     "contact_tuteur"=>"required",
        //     "email"=>"required",
        //     // "photo"=>"required|mimes:jpg.jpeg,png",
        // ]);
        $student = Student::find($request->get('id'));
    
        if ($request->hasFile('fichier')) {
            $fullName = $request->file('fichier')->getClientOriginalName();
            $name = pathinfo($fullName, PATHINFO_FILENAME);
            $extension = $request->file('fichier')->getClientOriginalExtension();
            $nameTosore = $name . '_!' . time() . '.' . $extension;
            $destination = public_path('public/student_image_profile');
            $fichier = $request->file('fichier')->move($destination, $nameTosore);
            $fichier = url('public/student_image_profile') . '/' . $nameTosore;
            
        }else{
            $fichier = "vide";
        }

       
        $student->photo = $fichier;
        $student->nom = $request->get('nom');
        $student->droit = $request->get('droit');
        $student->redoublant = $request->get('redoublant');
        $student->regime = $request->get('regime');
        $student->interime = $request->get('interime');
        $student->lieu_naissance = $request->get('lieu_naissance');
        $student->prenom = $request->get('prenom');
        $student->sexe = $request->get('sexe');
        $student->date_naissance = $request->get('date_naissance');
        $student->matricule = $request->get('matricule');
        $student->nationalite = $request->get('nationalite');
        $student->niveau_id = $request->get('niveau_id');
        $student->classe_id = $request->get('classe_id');
        $student->scolarite = $request->get('scolarite');
        $student->oriente = $request->get('oriente');
        $student->email = $request->get('email');
        $student->adresse = $request->get('adresse');
        $student->maladie = $request->get('maladie');
        $student->transport = $request->get('transport');
        $student->cantine = $request->get('cantine');
        $student->nom_pere = $request->get('nom_pere');
        $student->contact_pere = $request->get('contact_pere');
        $student->nom_mere = $request->get('nom_mere');
        $student->contact_mere = $request->get('contact_mere');
        $student->nom_tuteur = $request->get('nom_tuteur');
        $student->contact_tuteur = $request->get('contact_tuteur');
        $student->autre = $request->get('autre');
        $student->annee_id = $request->get('annee_id');

        $student->save();

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
        $student = Student::find($id);
        $student->delete();
        return $this->index();
    }
   public function recherche($tem){
    $app=Student::where("matricule","LIKE", "%{$tem}%")->get();
    return response()->json($app, 200);
   }

   public function import(Request $request){
     //  print_r($request->dataExcel);
     //  if(isset($request->dataExcel)){
         
           $increment = 0;
           $data = $request->dataExcel;
           foreach ($data as $row) {
             //  print_r($row);
              $nom_eleve=$row['NOM'];
              $droit = $row['DROIT'];
              $redoublant = $row['REDOUBLANT'];
              $regime = $row['REGIME'];
              $interime = $row['INTERIME'];
              $lieu_naissance = $row['LIEU_NAISSANCE'];
              $prenom=$row['PRENOM'];
              $sexe=$row['SEXE'];
              $date_naissance=Carbon::parse($row['DATE_NAISSANCE'])->format('Y-m-d');
              $matricule=$row['MATRICULE'];
              $scolarite=$row['SCOLARITE'];
              $oriente=$row['ORIENTE'];
              $nationalite=$row['NATIONALITE'];
              $email=$row['EMAIL'];
              $adrr=$row['ADRESSE'];
              $maladie=$row['MALADIE'];
              $transp=$row['TRANSPORT'];
              $cantine=$row['CANTINE'];
              $photo="vide";
              $nom_pere=$row['NOM_PERE'];
              $contact_pere=$row['CONTACT_PERE'];
              $nom_mere=$row['NOM_MERE'];
              $contact_mere=$row['CONTACT_MERE'];
              $nom_tuteur=$row['NOM_TUTEUR'];
              $contact_tuteur=$row['CONTACT_TUTEUR'];
              $autre=$row['AUTRE'];
              $annee_id=$row['ANNEE_ID'];
              $niveau_id=$row['NIVEAU_ID'];
              $classe_id=$row['CLASSE_ID'];

              $verifie_etudiant = Student::where("matricule", $matricule)->count(); 
              $recup_etudiant = Student::where("matricule", $matricule)->first(); 

               if($verifie_etudiant <= 0){ //si la base de données est vierge on peut faire +sieurs enrégistrement

                        Student::create([
                            'nom'=>$nom_eleve,
                            'prenom'=>$prenom,
                            'droit'=>$droit,
                            'interime'=>$interime,
                            'lieu_naissance'=>$lieu_naissance,
                            'regime'=>$regime,
                            'redoublant'=>$redoublant,
                            'sexe'=>$sexe,
                            'date_naissance'=>$date_naissance,
                            'matricule'=>$matricule,
                            'scolarite'=>$scolarite,
                            'oriente'=>$oriente,
                            'nationalite'=>$nationalite,
                            'email'=>$email,
                            'adresse'=>$adrr,
                            'maladie'=>$maladie,
                            'transport'=>$transp,
                            'cantine'=>$cantine,
                            'photo'=>$photo,
                            'nom_pere'=>$nom_pere,
                            'contact_pere'=>$contact_pere,
                            'nom_mere'=>$nom_mere,
                         //   'id'=>$increment,
                            'contact_mere'=>$contact_mere,
                            'nom_tuteur'=>$nom_tuteur,
                            'contact_tuteur'=>$contact_tuteur,
                            'autre'=>$autre,
                            'niveau_id'=>$niveau_id,
                            'annee_id'=>$annee_id,
                            'classe_id'=>$classe_id,
                        ]);

                    ++ $increment;

                }
           }
           if($increment >0){
            return response()->json($increment,201);
            }else{
                return response()->json($increment,419);
            }
     //  }
   }
}

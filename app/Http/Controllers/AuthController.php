<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::all();
        return response()->json($user);

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
            "password"=>"required"
        ]);

        if($request->hasFile('file')){
            $fullName = $request->file('file')->getClientOriginalName();
            $name = pathinfo($fullName, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $nameToStore = $name.'_'.time().'.'.$extension;
            $destination = 'user/profile_picture';
            $delete = $request->file('file')->move($destination, $nameToStore);
            $image = url('user/profile_picture').'/'.$nameToStore;
        }
        else{
            $image ="vide";
        }
        //
                   
            $user = new User();
            $user->image = $image;
            $user->adresse = $request->adresse;
            $user->name = $request->name;
            // $user->matricule = $request->matricule;
            $user->sexe = $request->sexe;
            $user->annee_id = $request->annee_id;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->actived = 1;
            $user->role_id = $request->role_id;
            $user->password = Hash::make($request->password);
             $user->save();
    
            if($request->role_id != null){
                $user->roles()->attach($request->role_id);
                 $user->save();
            }
    
            if($request->permissions != null){            
                foreach ($request->permissions as $permission) {
                    $user->permissions()->attach($permission);
                     $user->save();
                }
            }
    
            return response()->json($user, 201);
         
       
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
        $user = User::find($id);
        return response()->json($user);
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
         
          $user = User::find($request->get('id'));
        
          if($request->permissions != null  && $request->role_id != null ){

              if ($request->hasFile('fichier')) {
                  $fullName = $request->file('fichier')->getClientOriginalName();
                  $name = pathinfo($fullName, PATHINFO_FILENAME);
                  $extension = $request->file('fichier')->getClientOriginalExtension();
                  $nameTosore = $name . '_!' . time() . '.' . $extension;
                  $destination = public_path('user/profile_picture');
                  $fichier = $request->file('fichier')->move($destination, $nameTosore);
                  $fichier = url('user/profile_picture') . '/' . $nameTosore;
          
              }else{
                  $fichier = "vide";
              }
              
            $user->image = $fichier;
            $user->sexe = $request->get('sexe');
            $user->adresse = $request->get('adresse');
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            // $user->matricule = $request->get('matricule');
            $user->phone = $request->get('phone');
            $user->annee_id = $request->get('annee_id');
            $user->role_id = $request->get('role_id'); 
            $user->actived = 1;
    
            $user->save();
    
            $user->permissions()->detach(); //Supprime la relation anterieure permission et user
            $user->roles()->detach(); //Supprime la relation anterieure role et user
    
            if($request->role_id != null){ //Vérifie si le role existe
                $user->roles()->attach($request->role_id); //recupère le user et son rôle
                $user->save(); //Enrégistrer dans la table pivot user(id) et role(id)
            }
    
            if($request->permissions != null){   //Vérifie si la permission  existe          
                foreach ($request->permissions as $permission) { //Parcours la liste des permissions choisie
                    $user->permissions()->attach($permission); //recupère le user et ses permissions
                    $user->save(); //Enrégistrer dans la table pivot user(id) et permissions(id)
                }
            }
            return $this->show($request->get('id'));

          }else{

            if ($request->hasFile('fichier')) {
                $fullName = $request->file('fichier')->getClientOriginalName();
                $name = pathinfo($fullName, PATHINFO_FILENAME);
                $extension = $request->file('fichier')->getClientOriginalExtension();
                $nameTosore = $name . '_!' . time() . '.' . $extension;
                $destination = public_path('user/profile_picture');
                $fichier = $request->file('fichier')->move($destination, $nameTosore);
                $fichier = url('user/profile_picture') . '/' . $nameTosore;
        
            }else{
                $fichier = "vide";
            }
            
          $user->image = $fichier;
          $user->adresse = $request->get('adresse');
          $user->name = $request->get('name');
          $user->sexe = $request->get('sexe');
          $user->email = $request->get('email');
        //   $user->matricule = $request->get('matricule');
          $user->phone = $request->get('phone');
          $user->annee_id = $request->get('annee_id');
          $user->role_id = $request->get('role_id'); 
          $user->actived = 1;
  
          $user->save();
  
          return $this->show($request->get('id'));

          }
    }

    public function suspendre(Request $request, $id){

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->sexe = $request->sexe;
        // $user->matricule = $request->matricule;
        $user->annee_id = $request->annee_id;
        $user->actived = 0;
        $user->role_id = $request->role_id;
        $user->update();
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
    }

    // public function logout()
    // {
    //     auth()->logout();

    //     return response()->json(['message' => 'Successfully logged out']);
    // }


    public function searchs(Request $request){
        $search = $request->get('s');
        $users = User::where(function($query) use ($search){
            $query->where('name', 'LIKE','%$search%')->orWhere('email', 'LIKE','%$search%');
        })->latest()->get();
        return response()->json([
            'users'=>$users
        ]);
    }

}

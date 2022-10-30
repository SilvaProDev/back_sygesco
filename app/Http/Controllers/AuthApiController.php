<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Affectation;
use Carbon\Carbon;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Tymon\JWTAuth\JWTManager as JWT;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Cache;

class AuthApiController extends Controller
{




 /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function online()
    {
        $users = User::all();
        // foreach ($users as $user) {
        //     if (Cache::has('user-is-online-' . $user->id))
        //         return ($user ." is online. Last seen: " . Carbon::parse($user->last_seen)->diffForHumans());
        //     else
        //         return $user->name . " is offline. Last seen: " . Carbon::parse($user->last_seen)->diffForHumans();
        // }
          
        return response()->json($users);
    }

    public function login()
    {
        
        $credentials = request(['email', 'password']);
        $credential = request(['UserRole']);
        if($credentials['email'] !=null){

            if (!$token = auth()->attempt($credentials)) {
                return response()->json([
                    'success' => false,
                    'message' => "L'email ou le mot de passe est invalide.",
                ], 401);
            }

            $users = User::find(Auth::id());
            if($users->role_id == $credential['UserRole']){
                // User::where('id', Auth::user()->id)->update(['last_seen' => Carbon::now()]);
               // User::where('id', Auth::user()->id)->update(['is_online' => 1]);
                return $this->respondWithToken($token);
            } else{
                return response()->json([
                    'success' => false,
                    'message' => "L'email ou le mot de passe est invalide. Verifier si vous avez choisi le bon onglet",
                ], 401);
            }
           
        }else{
            $credentials = request([ 'password','phone']);
            $credential = request(['UserRole']);
           
            if (! $token = auth()->attempt($credentials)) {
                return response()->json([
                    'success' => false,
                    'message' => "L'email ou le mot de passe est invalide.",
                ], 401);
            }  
            
            $users = User::find(Auth::id());
            if($users->role_id == $credential['UserRole']){
                // User::where('id', Auth::user()->id)->update(['last_seen' => Carbon::now()]);
                User::where('id', Auth::user()->id)->update(['is_online' => 1]);
                return $this->respondWithToken($token);
            } else{
                return response()->json([
                    'success' => false,
                    'message' => "L'email ou le mot de passe est invalide. Verifier si vous avez choisi le bon onglet",
                ], 401);
            }
           
        }
       
    }
    public function userProfile() {
       // $user = auth()->user();
        $users = User::with('roles','affectations')->find(Auth::id());
        // $aff = Affectation::with('affectations')->find(Auth::id());
        return response()->json($users);
    }

    public function getAuthenticatedUser(){
        try{
            if(!$user = JWTAuth::parseToken()->authenticate()){
                return response()->json(['user_not_found'], 400);
            }
        }catch (TokenExpiredException $e){
            return response()->json(['token_expired'], $e->getStatusCode());
        }catch (TokenInvalidException $e){
            return response()->json(['token_invalid'], $e->getStatusCode());
        }catch (JWTException $e){
            return response()->json(['token_absent'], $e->getStatusCode());
        }

        return response()->json(['user'=>$user]);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {

        $users = User::find($request->get('id'));
        $users->update(['is_online' => 0]);
  
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
       
        // $credentials = request(['email']);
        // if($credentials['email'] !=null){

        //     if (! $token = auth()->attempt($credentials)) {
        //         return response()->json([
        //             'success' => false,
        //             'message' => "L'email ou le mot de passe est invalide.",
        //         ], 401);
        //     }

        //     $users = User::find(Auth::id());
        //     User::where('id', Auth::user()->id)->update(['is_online' => 0]);
      
        //     auth()->logout();
    
        //     return response()->json(['message' => 'Successfully logged out']);
        // }
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
        
    }

    public function changePassword(Request $request){

        $credentials = ['email'=>$request->email, 'password'=>$request->password];

        if (! $token = auth()->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => "le mot de passe est invalide.",
            ], 401);
        }

        $user = User::find($request->get('id')); 
        $user->password = Hash::make($request->nouveau_mot_de_passe); 
        $user->save();
        Auth::logout();
        // $ValidateData = $request->validate([
        //     'ancien'=> 'required',
        //     'password'=> 'required',
        // ]);

        // $user = User::find($request->get('id'));    
        // $has_user_pwd = auth()->user()->password;
        // if(Hash::check($request->ancien,$has_user_pwd)) {
        //     $user->password = Hash::make($request->nouveau_mot_de_passe);

        //     $user->save();
        //      Auth::logout();
        //     return response()->json([
        //         'success' => true,
        //         'message' => " le mot de passe est valide.",
        //     ], 400);
        // }else{
        //     return response()->json([
        //         'success' => false,
        //         'message' => " le mot de passe est invalide.",
        //     ], 403);
        // }
        
   
    }

        

}

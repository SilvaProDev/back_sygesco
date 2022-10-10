<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnneeScolaireController;
use App\Http\Controllers\NiveauController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SemestreController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\CantineController;
use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\ScolariteController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\SendSmsController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\ConfigEnteteController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\BilanController;
use App\Http\Controllers\NouvelleMatiereController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthApiController;
use App\Http\Controllers\AffectationController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\LivretController;
use App\Http\Controllers\ConfigLivretController;
use App\Http\Controllers\CompetanceLivretController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::middleware('auth')->get('/user', function(Request $request){
//     return $request->user();
// });

Route::group([ 'prefix' => 'auth'], function () {
    
    Route::post('login', [AuthApiController::class, 'login']);
    Route::post('logout', [AuthApiController::class, 'logout']);
    Route::post('refresh', [AuthApiController::class, 'refresh']);
    Route::post('me', [AuthApiController::class, 'me']);
    Route::get('user-online', [AuthApiController::class, 'online']);
    Route::get('profile_user', [AuthApiController::class, 'getAuthenticatedUser']);
    Route::get('user-profile', [AuthApiController::class, 'userProfile']);
    Route::post('user-logout', [AuthApiController::class, 'logout']);
    Route::post('change-password', [AuthApiController::class, 'changePassword']);

});

Route::group(['prefix'=>''], function(){

    //Route année scolaire
    Route::get("liste_annee", [AnneeScolaireController::class, 'index']);
    Route::get("show_annee/{id}", [AnneeScolaireController::class, 'show']);
    Route::post("add_annee", [AnneeScolaireController::class, 'store']);
    Route::put("encours/{id}", [AnneeScolaireController::class, 'Encours']);
    Route::put("update_annee/{id}", [AnneeScolaireController::class, 'update']);
    Route::delete("delete_annee/{id}", [AnneeScolaireController::class, 'destroy']);
    
    //Route api niveau
    Route::get("niveau", [NiveauController::class, 'index']);
    Route::get("niveau/{id}", [NiveauController::class, 'show']);
    Route::post("niveau", [NiveauController::class, 'store']);
    Route::put("niveau/{id}", [NiveauController::class, 'update']);
    Route::delete("niveau/{id}", [NiveauController::class, 'destroy']);

    //Route api classe
    Route::get("classe", [ClasseController::class, 'index']);
    Route::get("classe/{id}", [ClasseController::class, 'show']);
    Route::post("classe", [ClasseController::class, 'store']);
    Route::put("classe/{id}", [ClasseController::class, 'update']);
    Route::delete("classe/{id}", [ClasseController::class, 'destroy']);

    //Route api eleve
    Route::get("student", [StudentController::class, 'index']);
    Route::get("student/{id}", [StudentController::class, 'show']);
    Route::get("student_par_classe/{id}", [StudentController::class, 'recherche']);
    Route::post("students", [StudentController::class, 'store']);
    Route::post("student", [StudentController::class, 'update']);
    Route::delete("student/{id}", [StudentController::class, 'destroy']);
    Route::post("import/student", [StudentController::class, 'import']);

        //Route api Matière
    Route::get("matiere", [MatiereController::class, 'index']);
    Route::get("matiere/{id}", [MatiereController::class, 'show']);
    Route::post("matiere", [MatiereController::class, 'store']);
    Route::put("matiere/{id}", [MatiereController::class, 'update']);
    Route::delete("matiere/{id}", [MatiereController::class, 'destroy']);

    //Route api Semestre/trimestre
    Route::get("trimestre", [SemestreController::class, 'index']);
    Route::get("trimestre/{id}", [SemestreController::class, 'show']);
    Route::post("trimestre", [SemestreController::class, 'store']);
    Route::put("trimestre/{id}", [SemestreController::class, 'update']);
    Route::put("trimestre_encours/{id}", [SemestreController::class, 'Semestre_Encours']);
    Route::delete("trimestre/{id}", [SemestreController::class, 'destroy']);

    //Route api Semestre/trimestre
    Route::get("note", [NoteController::class, 'index']);
    Route::get("moyenne", [NoteController::class, 'moyennes']);
    Route::get("note/{id}", [NoteController::class, 'show']);
    Route::post("note", [NoteController::class, 'store']);
    Route::put("note/{id}", [NoteController::class, 'update']);
    Route::delete("note/{id}", [NoteController::class, 'destroy']);

    //Route api de La cantine
    Route::get("cantine", [CantineController::class, 'index']);
    Route::get("cantine/{id}", [CantineController::class, 'show']);
    Route::post("cantine", [CantineController::class, 'store']);
    Route::put("cantine/{id}", [CantineController::class, 'update']);
    Route::delete("cantine/{id}", [CantineController::class, 'destroy']);

    //Route api de La cantine
    Route::get("absence", [AbsenceController::class, 'index']);
    Route::get("absence/{id}", [AbsenceController::class, 'show']);
    Route::post("absence", [AbsenceController::class, 'store']);
    Route::put("absence/{id}", [AbsenceController::class, 'update']);
    Route::delete("absence/{id}", [AbsenceController::class, 'destroy']);

    //Route api du paiement de la scolarité
    Route::get("scolarite", [ScolariteController::class, 'index']);
    Route::get("scolarite/{id}", [ScolariteController::class, 'show']);
    Route::post("scolarite", [ScolariteController::class, 'store']);
    Route::put("scolarite/{id}", [ScolariteController::class, 'update']);
    Route::delete("scolarite/{id}", [ScolariteController::class, 'destroy']);

    //Route api pour envoi d'email
    Route::get("envoi-email", [SendMailController::class, 'AllEmail']);
    Route::get("envoi-email/{id}", [SendMailController::class, 'show']);
    Route::post("envoi-email", [SendMailController::class, 'store']);
    Route::post("envoi-email-unique", [SendMailController::class, 'UniqueEmail']);
    Route::put("envoi-email/{id}", [SendMailController::class, 'update']);
    Route::delete("envoi-email/{id}", [SendMailController::class, 'destroy']);

     //Route api pour envoi de sms
     Route::get("envoi-sms", [SendSmsController::class, 'index']);
     Route::get("envoi-sms/{id}", [SendSmsController::class, 'show']);
     Route::post("envoi-sms", [SendSmsController::class, 'sendSMS']);
     Route::put("envoi-sms/{id}", [SendSmsController::class, 'update']);
     Route::delete("envoi-sms/{id}", [SendSmsController::class, 'destroy']);

     //Route api pour le transport
     Route::get("transport", [TransportController::class, 'index']);
     Route::get("transport/{id}", [TransportController::class, 'show']);
     Route::post("transport", [TransportController::class, 'store']);
     Route::put("transport/{id}", [TransportController::class, 'update']);
     Route::delete("transport/{id}", [TransportController::class, 'destroy']);

     //Route api pour la configuration de l 'entête
     Route::get("config-entete", [ConfigEnteteController::class, 'index']);
     Route::get("config-entete/{id}", [ConfigEnteteController::class, 'show']);
     Route::post("config-entetes", [ConfigEnteteController::class, 'store']);
     Route::post("config-entete", [ConfigEnteteController::class, 'update']);
     Route::delete("config-entete/{id}", [ConfigEnteteController::class, 'destroy']);

     //Route api pour le role
     Route::get("role", [RoleController::class, 'index']);
     Route::get("role/{id}", [RoleController::class, 'show']);
     Route::post("role", [RoleController::class, 'store']);
     Route::put("role/{id}", [RoleController::class, 'update']);
     Route::delete("role/{id}", [RoleController::class, 'destroy']);

     //Route api pour la permission
     Route::get("permission", [PermissionController::class, 'index']);
     Route::get("permission/{id}", [PermissionController::class, 'show']);
     Route::post("permission", [PermissionController::class, 'store']);
     Route::put("permission/{id}", [PermissionController::class, 'update']);
     Route::delete("permission/{id}", [PermissionController::class, 'destroy']);

     //Route api pour le bilan
     Route::get("bilan", [BilanController::class, 'index']);
     Route::get("bilan/{id}", [BilanController::class, 'show']);
     Route::post("bilan", [BilanController::class, 'store']);
     Route::put("bilan/{id}", [BilanController::class, 'update']);
     Route::delete("bilan/{id}", [BilanController::class, 'destroy']);

     //Route api pour la Nouvelle Matiere
     Route::get("nouvelle-matiere", [NouvelleMatiereController::class, 'index']);
     Route::get("nouvelle-matiere/{id}", [NouvelleMatiereController::class, 'show']);
     Route::post("nouvelle-matiere", [NouvelleMatiereController::class, 'store']);
     Route::put("nouvelle-matiere/{id}", [NouvelleMatiereController::class, 'update']);
     Route::delete("nouvelle-matiere/{id}", [NouvelleMatiereController::class, 'destroy']);

     //Route api pour les utilisateurs
     Route::get("user", [AuthController::class, 'index']);
     Route::get("search/user", [AuthController::class, 'searchs']);
     Route::get("user/{id}", [AuthController::class, 'show']);
     Route::post("user", [AuthController::class, 'store']);
     Route::post("user-update", [AuthController::class, 'update']);
     Route::put("user_suspendre/{id}", [AuthController::class, 'suspendre']);
     Route::delete("user/{id}", [AuthController::class, 'destroy']);

     //Route api pour les affectations
     Route::get("affectation", [AffectationController::class, 'index']);
     Route::get("affectation/{id}", [AffectationController::class, 'show']);
     Route::post("affectation", [AffectationController::class, 'store']);
     Route::post("affectations", [AffectationController::class, 'update']);
     Route::delete("affectation/{id}", [AffectationController::class, 'destroy']);

     //Route api pour les affectations
     Route::get("accueil", [AccueilController::class, 'index']);
     Route::get("accueil/{id}", [AccueilController::class, 'show']);
     Route::post("accueils", [AccueilController::class, 'store']);
     Route::post("accueil", [AccueilController::class, 'update']);
     Route::delete("accueil/{id}", [AccueilController::class, 'destroy']);

     //Route api pour le livret
     Route::get("livret", [LivretController::class, 'index']);
     Route::get("livret/{id}", [LivretController::class, 'show']);
     Route::post("livret", [LivretController::class, 'store']);
     Route::put("livret/{id}", [LivretController::class, 'update']);
     Route::delete("livret/{id}", [LivretController::class, 'destroy']);

     //Route api pour la config du livret
     Route::get("config-livret", [ConfigLivretController::class, 'index']);
     Route::get("config-livret/{id}", [ConfigLivretController::class, 'show']);
     Route::post("config-livret", [ConfigLivretController::class, 'store']);
     Route::put("config-livret/{id}", [ConfigLivretController::class, 'update']);
     Route::delete("config-livret/{id}", [ConfigLivretController::class, 'destroy']);

     //Route api pour la config du livret
     Route::get("competence-livret", [CompetanceLivretController::class, 'index']);
     Route::get("competence-livret/{id}", [CompetanceLivretController::class, 'show']);
     Route::post("competence-livret", [CompetanceLivretController::class, 'store']);
     Route::put("competence-livret/{id}", [CompetanceLivretController::class, 'update']);
     Route::delete("competence-livret/{id}", [CompetanceLivretController::class, 'destroy']);




});

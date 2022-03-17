<?php

namespace App\Http\Controllers;

use view;
use App\Models\User;
use App\Models\Statu;
use App\Models\Tache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class TacheController extends Controller
{
    public function index()
    {
        $taches = Tache::all();//ici on recupere toutes les taches et on les garde dans la variable $taches
        return view('dashboard', [//ici on retourne la vue accueil
            'taches' => $taches//ici on affiche sur la vue accueil les taches gardés dans la variable $taches
        ]);
    }

    public function create($taches=null)
    {
        $users = User::all(['id', 'nom']);//ici on recupere l id et le nom de tous les utilisateur et on garde dans la varianle $users
        return View('tache.create', compact('users'));//on affcihe ensuite ces informations de la variable $users
    }

    public function store(Request $request)
    {
        //ici on verifie si les champs ne sont pas enregistrés en etant vides
        $request->validate([
            'titre' => 'required',
            'detail' => 'required',
            //'status_id' => 'required',
            'users_id' => 'required'
        ]);

        $users_id = Auth::user()->id;
        //on enregistre une tache dans la bd
        $taches = new Tache([
            'titre' => $request->input('titre'),
            'detail' => $request->input('detail'),
            'status_id' => 1,//ici on enregistre la tache avec un statut par defaut où l id=1 qui est le status 'a faire'
            'users_id' => $request->input('users_id'),
        ]);
        $taches->save();
        return redirect('/dashboard')->with('message','La tache a bien été créée !');
    }

    public function show($id)
    {
        $tache = Tache::findorFail($id);//ici on fait une recherche de l id des taches et on garde le resultat dans la variable $tache
        return view('tache', [
            'tache' =>  $tache //ensuite on affiche
        ]);
    }

    public function edit($id)
    {
        $users = User::all();//on recupere tous les utilisateurs on garde dans $users
        $status = Statu::all();//on recupere tous les status on garde dans $status
        $tache = Tache::find($id);//on fait une recherche de l id de tache et on garde dans $tache
        return view('tache.edit', compact('tache', 'id', 'users', 'status'));//ensuite on affiche
    }

    public function update($id, Request $request)
    {
        $data = $request->validate([
            'titre' => 'required|max:100',
            'detail' => 'required|max:500',
            'users_id' => 'required',
            'status_id' => 'required'
        ]);

        $users_id = Auth::user()->id;
        $tache = Tache::find($id);

        $tache->titre = $request->titre;
        $tache->detail = $request->detail;
        $tache->users_id = $request->users_id;
        $tache->status_id = $request->status_id;
        $tache->save();
        return redirect('/dashboard/taches/'.$id)->with('message', "La tâche a bien été modifiée !");
    }

    public function destroy($id)
    {
        $tache = Tache::find($id);
        $tache->delete();
        return redirect('/dashboard')->with('message', "La tâche a bien été supprimée !");
    }
}

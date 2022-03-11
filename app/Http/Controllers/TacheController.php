<?php

namespace App\Http\Controllers;

use view;
use App\Models\User;
use App\Models\Tache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TacheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taches = Tache::all();
        return view('dashboard', [
            'taches' => $taches
        ]);

        //dd($id);
        // return view(..)
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all(['id', 'nom']);
        //$users = User::lists(['name', 'id']);

        //return view('prices.create', compact('id', 'items'));
        return View('tache.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'detail' => 'required',
            'users_id' => 'required'
        ]);

        $users_id = Auth::user()->id;
        //dd($users_id);
        $taches = new Tache([
            'titre' => $request->input('titre'),
            'detail' => $request->input('detail'),
            'users_id' => $request->input('users_id'),
        ]);
        $user = User::find($users_id);
        //dd($user);
        //dd($taches);
        $user->taches()->create([
            'titre' => $request->input('titre'),
            'detail' => $request->input('detail'),
            'users_id' => $request->input('users_id'),
        ]);
        //return back()->with('La tache a bien été créée !');
        return redirect('/dashboard')->with('La tache a bien été créée !');

        /*Tache::create([
            'titre' => $request->titre,
            'detail' => $request->detail,
            'users_id' =>$request->users_id
        ]);
        dd('Tache créée !');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tache = Tache::findorFail($id);
        return view('tache', [
            'tache' =>  $tache
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Tache $tache)
    {
        $tache = Tache::find($id);
        return view('tache.edit', compact('tache', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Tache $tache)
    {
        $users = User::all();
        $data = $request->validate([
            'titre' => 'required|max:100',
            'detail' => 'required|max:500',
            'users_id' => 'required'
        ]);
        $users_id = Auth::user()->id;
        //dd($users_id);
        $taches = new Tache([
            'titre' => $request->input('titre'),
            'detail' => $request->input('detail'),
            'users_id' => $request->input('users_id'),
        ]);
        $user = User::find($users_id);
        $tache->titre = $request->titre;
        $tache->detail = $request->detail;
        $tache->users_id = $request->users_id;
        //$tache->state = $request->has('state');
        $tache->save();
        return back()->with('message', "La tâche a bien été modifiée !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Tache $tache)
    {
        $tache->delete();
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Rubrique;
use App\Models\Tache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RubriqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rubrique.createrubrique');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $taches = Tache::all(['id', 'titre']);
        return view('rubrique.createrubrique', compact('taches'));
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
            'nom' => 'required',
            'tache_id' => 'required'
        ]);

        $tache_id = Auth::user()->id;
        //dd($tache_id);
        $rubriques = new Rubrique([
            'nom' => $request->input('nom'),
            'tache_id' => $request->input('tache_id'),
        ]);
        $tache = Tache::find($tache_id);
        //dd($user);
        //dd($taches);
        $tache->rubrique()->create([
            'nom' => $request->input('nom'),
            'tache_id' => $request->input('tache_id'),
        ]);
        //return back()->with('La tache a bien été créée !');
        return redirect('/dashboard')->with('La rubrique a bien été créée !');
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

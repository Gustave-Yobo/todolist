<?php

namespace App\Http\Controllers;

use App\Models\Statu;
use App\Models\Tache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatuController extends Controller
{
    public function index()
    {
        return view('rubrique.createrubrique');
    }

    public function create()
    {
        $taches = Tache::all(['id', 'titre']);
        return view('rubrique.createrubrique', compact('taches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
        ]);

        $status = new Statu([
            'nom' => $request->input('nom'),
        ]);
        $status->save();
        return redirect('/dashboard')->with('message', 'Le status a bien été créée !');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

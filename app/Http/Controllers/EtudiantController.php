<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\Filiere;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        $search = $req->input("search");
        $filiere_id = $req->input("filiere");
        $filieres = Filiere::all();
        $query = Etudiant::query();
    
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nom', 'like', "%$search%")
                  ->orWhere('prenom', 'like', "%$search%");
            });
        }
    
        if ($filiere_id) {
            $query->where("filiere_id", $filiere_id);
        }
    
        $etudiants = $query->orderBy("nom", "asc")->paginate(5); // Utilisation de la requête construite pour la pagination
    
        return view("etudiants.index", compact("etudiants", "filieres"));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $filieres = Filiere::all();

        return view('etudiants.create', [
            'filieres'=>$filieres
        ]);
        //

    }

    public function byCodeFiliere(string $code){
        //dd($code);
        $filiere=Filiere::firstWhere('code', $code);
        if(!isset($filiere))
            return redirect()->route("etudiants.index");
        $etudiants = $filiere->etudiants;
        // dd($etudiants);
        


    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
       // dd($request->all());
        $rules = [
            'nom' => 'required|string|min:3',
            'prenom' => 'required|string|min:3',
            'sexe' => 'required',
            'adresse' => 'required|string|min:4',
            'date_naissance' => 'required|date',
            'numero'=>'required|numeric'
        ];
        $validatedData = $request->validate($rules);
        $etudiant = new Etudiant;
        $etudiant->filiere_id = $request->input('filiere');
        $etudiant->nom = $request->input('nom');
        $etudiant->prenom = $request->input('prenom');
        $etudiant->sexe = $request->input('sexe');
        $etudiant->adresse = $request->input('adresse');
        $etudiant->date_naissance = $request->input('date_naissance');
        $etudiant->numero = $request->input('numero');
        $etudiant->save();
        return redirect()->route("etudiants.index");



  }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

        $etudiant= Etudiant::findOrFail($id);
        $filieres = Filiere::all();
        return view('etudiants.edit',compact('etudiant','filieres'));

    }


    /**
     * Update the specified resource in storage.
     */
    // 80
    public function update(Request $request, string $id)
    {
        //
        // dd($request->all());
        $etudiant= Etudiant::findOrFail($id);
        $etudiant->filiere_id = $request->input('filiere');
        $etudiant->nom = $request->input('nom');
        $etudiant->prenom = $request->input('prenom');
        $etudiant->sexe = $request->input('sexe');
        $etudiant->adresse = $request->input('adresse');
        $etudiant->date_naissance = $request->input('date_naissance');
        $etudiant->numero = $request->input('numero');
        $etudiant->update();
        return redirect()->route("etudiants.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $etudiant= Etudiant::findOrFail($id);
        $etudiant->delete();
        return redirect()->route("etudiants.index");
    }
}

<?php

namespace App\Services\DataServices;

use App\Models\Ressource;
use Illuminate\Http\Request;

class RessourceService implements DataServiceInterface {

    private  $matiereService;
    public function __construct(MatiereService $matServ)
    {
        $this->matiereService = $matServ;
    }

    public function validateStoreRequest(Request $request) {
        $inputs = $request->validate([
            'ressource' => 'required',
            'matiere' => 'required',
            'type' => 'required|in:cours,examen,epreuve,concours,exercice',
        ]);

        if(!$request->hasFile('ressource')) {
            return back()->withInput($inputs)->withErrors(['ressource'=>'Veillez sélectionner un fichier']);
        }
        // dd($inputs['matiere']);
        if(!$this->matiereService->get($inputs['matiere'])) {
            return back()->withInput($inputs)->withErrors(['matiere'=>'Matiere invalide']);
        }

        if($inputs['type'] == 'examen') {
            $request->validate(['examen' => 'required|in:cepd,bepc,probatoire,bac' ]);
        }

    }

    public function store($inputs, $files=[])
    {
        $newRessource = new Ressource();
        $resMatiere = $this->matiereService->get($inputs['matiere']);
        $resName = $inputs['type'].'_'.$resMatiere->classe->nom.'_'.$resMatiere->nom.'_'.now()->format('Y-M-d_His');
        // dd($resName);
        $path = $files['ressource']->storeAs(
            'ressource/'.$inputs['type'],
            $resName,
            'public'
        );
        $newRessource->nom_ressource = $path;
        $newRessource->type = $inputs['type'];
        $newRessource->examen = $inputs['examen'];
        $newRessource->etablissement = $inputs['etablissement'];
        $newRessource->annee = $inputs['annee'];
        $newRessource->chapitre = $inputs['chapitre'];
        $newRessource->description = $inputs['description'];
        $newRessource->matiere()->associate($resMatiere);
        // dd($newRessource);
        $newRessource->save();
    }

    public function get($id)
    {

    }
}

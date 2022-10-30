<?php

namespace App\Services\DataServices;

use App\Models\Ressource;
use Illuminate\Http\Request;

class RessourceService implements DataServiceInterface {

    private  $matiereService;
    public function __construct(MatiereService $matServ) {
        $this->matiereService = $matServ;
    }

    public function init() {

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
        if(!$this->matiereService->find($inputs['matiere'])) {
            return back()->withInput($inputs)->withErrors(['matiere'=>'Matiere invalide']);
        }
        if($inputs['type'] == 'cours') {
            $request->validate(['chapitre' => 'required' ]);
        }
        if($inputs['type'] == 'examen') {
            $request->validate(['examen' => 'required|in:cepd,bepc,probatoire,bac' ]);
        }
        if($inputs['type'] == 'concours') {
            $request->validate(['concours' => 'required' ]);
        }

    }

    public function store($inputs, $files=[]) {
        $newRessource = new Ressource();
        $resMatiere = $this->matiereService->find($inputs['matiere']);
        $resName = $inputs['type'].'_'.$resMatiere->classe->nom.'_'.$resMatiere->nom.'_'.now()->format('Y-M-d_His').'.'. $files['ressource']->extension();
        // dd($resName);
        $path = $files['ressource']->storeAs(
            'ressource/'.$inputs['type'],
            $resName,
            'public'
        );
        $newRessource->nom_ressource = $path;
        $newRessource->type = $inputs['type'];
        $newRessource->examen = $inputs['examen'];
        $newRessource->concours = $inputs['concours'];
        $newRessource->etablissement = $inputs['etablissement'];
        $newRessource->annee = $inputs['annee'];
        $newRessource->chapitre = $inputs['chapitre'];
        $newRessource->description = $inputs['description'];
        $newRessource->contributor_name = $inputs['contributor_name'];
        $newRessource->contributor_contact = $inputs['contributor_contact'];
        $newRessource->matiere()->associate($resMatiere);
        // dd($newRessource);
        $newRessource->save();
    }

    public function find($id) {
        return Ressource::find($id);
    }

    public function all($constrains=[]) {
        
    }
}

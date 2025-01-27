<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organ;
use App\Models\Reunion;
use Illuminate\Support\Facades\Validator;


class ReunionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAllReunions()
    {
        $reunions = Reunion::with('organ')->get(); // Récupère toutes les réunions avec les organes associés
    
        return response()->json($reunions); // Renvoie les réunions sous forme de JSON
    }

    public function index()
    {
        $organs = Organ::with('reunions')->get();
    
        $reunions = Reunion::with('organ')->get();
        return view('reunions.dashboardReunion', compact('organs', 'reunions'));
    }
    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données d'entrée
        $validator = Validator::make($request->all(), [
            'objet' => 'required|string',
            'details' => 'required|string',
            'id_organs' => 'required|exists:organs,id',
            'date_reunion' => 'required|date',
            'salle' => 'required|integer|min:1|max:100', // Exemple : Limiter les numéros de salle
        ]);
    
        // Vérification de la validation
        if ($validator->fails()) {
            dd($validator->errors()); // Affiche les erreurs pour le débogage
            return redirect()->route('reunions.create')
                ->withErrors($validator)
                ->withInput();
        }
    
        // Création de la réunion si la validation réussit
        $reunion = Reunion::create([
            'objet' => $request->objet,
            'details' => $request->details,
            'id_organs' => $request->id_organs,
            'date_reunion' => $request->date_reunion,
            'salle' => $request->salle,
        ]);
    
        // Enregistrer l'ID de la réunion dans la session
        session(['reunion_id' => $reunion->id]);
    
        // Redirection avec un message de succès
        session()->flash('success', 'Réunion enregistrée avec succès !');

        return redirect()->route('reunions.list', ['reunion_id' => $reunion->id])
            ->with('success', 'Réunion enregistrée avec succès !');
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $reunion= Reunion::findOrFail($id);
    
        // Validez les données du formulaire 
        $validatedData = $request->validate([
            'objet' => 'required|string',
            'details' => 'required|string',
            'id_organs' => 'required|exists:organs,id',
            'date_reunion' => 'required|date',
            'salle' => 'required|integer|min:1|max:100',
        ]);
    
        // Mettez à jour les champs du réunion
        $reunion->objet = $validatedData['objet'];
        $reunion->details = $validatedData['details'];
        $reunion->id_organs = $validatedData['id_organs'];
        $reunion->date_reunion = $validatedData['date_reunion'];
        $reunion->salle = $validatedData['salle'];

        // Enregistrez les modifications
        $reunion->save();
    
        // Redirigez vers la liste des Réunions avec un message de succès
        session()->flash('success', 'réunion mis à jour avec succès ! !');

        return redirect()->route('reunions.list')->with('success', 'réunion mis à jour avec succès !');
    }

    /**
 * Remove the specified resource from storage.
 */
public function destroy(string $id)
{
    // Trouver la réunion par son ID
    $reunion = Reunion::find($id);

    // Vérifier si la réunion existe
    if (!$reunion) {
        return redirect()->route('reunions.list')->with('error', 'Reunion introuvable.');
    }

    // Supprimer l'organ
    $reunion->delete();

    // Rediriger vers la liste avec un message de succès
    session()->flash('success', 'Reunion supprimée avec succès !');
    return redirect()->route('reunions.list')->with('success', 'Reunion supprimée avec succès !');
}

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Offre;
use \Validator;
use File;



class offreController extends Controller
{
    /**
     * Affichage de toutes les offres
     *
     * @param  \App\Offre  $offre
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $offre = Offre::all();
        return view('offres.index', compact('offre'));
    }
    /**
     * Retour de la vue permettant de créer une offre
     *
     * @param  \App\Offre  $offre
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('offres.create');
    }
    /**
     * Création d'une offre
     *
     * @param  \App\Offre  $offre
     * @return \Illuminate\View\View
     */
    public function store(Request $request)
    {
        $offre = new Offre;
        // On oblige à respecter certains critères avant de valider la requête
        $validator = Validator::make($request->all(), [
            'titre' => 'required|max:255',
            'niveau' => 'required|max:15',
            'fileUpload' => 'required|max:204800',
        ]);
        // Si la validation échoue
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        }
        // On stock le fichier sélectionné
        $pdf_upload = $request->file('fileUpload');
        // Définition du chemin de stockage
        $pdf_destination = public_path() . '\uploads\\';
        // Nommage du fichier
        $pdf_nommage = date('Y-m-d') . ' - ' . $pdf_upload->getClientOriginalName();
        // On indique le chemin du fichier pour la base de donnée
        $pdf_get = '\uploads\\' . $pdf_nommage;
        // Si il y a bien un fichier, on le déplace dans le répertoire et on stock le chemin dans la base de donnée        
        if ($pdf_upload) {
            if ($pdf_upload->move($pdf_destination, $pdf_nommage)) {
                $offre->pdf = $pdf_get;
            }
        } else {
            return redirect()->route('offres.index')->withStatus(__('Problème lors de l\'upload du PDF, veuillez essayer à nouveau.'));
        }
        $offre->titre = $request->get('titre');
        $offre->description = $request->get('description');
        $offre->niveau = $request->get('niveau');

        $offre->save();

        return redirect()->route('offres.index')->withStatus(__('Offre créée avec succès.'));
    }
    /**
     * Retour de la vue permettant de modifier une offre
     *
     * @param  \App\Offre  $offre
     * @return \Illuminate\View\View
     */
    public function edit(Offre $offre)
    {
        return view('offres.edit', compact('offre'));
    }

    /**
     * Mise à jour d'une offre
     *
     * @param  \App\Offre  $offre
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(Request $request, Offre $offre)
    {
        // On stock le fichier sélectionné 
        $pdf_upload = $request->file('fileUpload');
        // On oblige à respecter certains critères avant de valider la requête
        $validator = Validator::make($request->all(), [
            'titre' => 'required|max:255',
            'niveau' => 'required|max:15',
            'fileUpload' => 'required|max:204800',
        ]);
        // Si la validation échoue
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        }
        //Si il y a un fichier
        if ($pdf_upload) {
            // Définition du chemin de stockage
            $pdf_destination = public_path() . '\uploads\\';
            // Nommage du fichier
            $pdf_nommage = date('Y-m-d') . ' - ' . $pdf_upload->getClientOriginalName();
            // On indique le chemin du fichier pour la base de donnée
            $pdf_get = '\uploads\\' . $pdf_nommage;
            // Récupération du chemin de l'ancien fichier 
            $pdf_path_remplace = public_path() . $offre->pdf;

            if ($pdf_upload) {
                // Si le fichier existe, on le supprime
                if (File::exists($pdf_path_remplace)) {
                    unlink($pdf_path_remplace);
                }
                if ($pdf_upload->move($pdf_destination, $pdf_nommage)) {

                    $offre->titre = $request->get('titre');
                    $offre->description = $request->get('description');
                    $offre->niveau = $request->get('niveau');
                    $offre->pdf = $pdf_get;

                    $offre->save();
                }
            } else {
                return redirect()->route('offres.index')->withStatus(__('Problème lors de l\'upload du PDF, veuillez essayer à nouveau.'));
            }
        } else {
            $offre->update($request->all());
        }
        return redirect()->route('offres.index')->withStatus(__('Offre mise à jour avec succès'));
    }
    /**
     * Suppression d'une offre
     *
     * @param  \App\Offre  $offre
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Offre $offre)
    {
        // Récupération du chemin du fichier 
        $path = public_path() . $offre->pdf;
        // Si le fichier existe, on le supprime
        if (File::exists($path)) {
            unlink($path);
        }
        // Suppression de l'offre
        $offre->delete();

        return redirect()->route('offres.index')->withStatus(__('Offre supprimée avec succès'));
    }
}

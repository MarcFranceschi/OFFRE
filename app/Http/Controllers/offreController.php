<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\FormRequest;
use Illuminate\Http\UploadedFile;
use App\Offre;
use Redirect;
use Response;
use \Validator;
use File;
use FileModel;
use Illuminate\Support\Facades\Storage;


class offreController extends Controller
{
    //
   
    public function index()
    {
    $offre = Offre::all();
    //dd($offreslist);
    return view('offres.index',compact('offre'));
    }
    public function create()
    {
        return view('offres.create');
    }
    public function store(Request $request)
    { 
        $offre = new Offre;
        
        $pdf_upload = $request->file('fileUpload');
        
        $validator = Validator::make($request->all(), [
            'niveau' => 'required',
            'fileUpload' => 'required|max:204800',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        }
       
        $path_public = public_path();
        $pdf_destination = $path_public . '\uploads\\';
        $pdf_nommage = date('Y-m-d').' - '.$pdf_upload->getClientOriginalName();
        $pdf = $pdf_destination . $pdf_nommage;
        if($pdf_upload) {
                if($pdf_upload->move($pdf_destination, $pdf_nommage)) {
                    $offre->pdf = $pdf;
                }
            }else {
          return redirect()->route('offres.index')->withStatus(__('Problème lors de l\'upload du PDF, veuillez essayer à nouveau.'));
            }
        $offre->titre=$request->get('titre');
        $offre->description=$request->get('description');
        $offre->niveau=$request->get('niveau');

        $offre->save();
        return redirect()->route('offres.index')->withStatus(__('Offre créée avec succès.'));

    }
    /**
     * Show the form for editing the specified offre
     *
     * @param  \App\Offre  $offre
     * @return \Illuminate\View\View
     */
    public function edit(Offre $offre)
    {

       return view('offres.edit', compact('offre'));
    }
  
      /**
     * Update the specified user in storage
     *
     * @param  \App\Offre  $offre
     * @return \Illuminate\Http\RedirectResponse
     */
    
    public function update(Request $request, Offre $offre)
    {
        $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'niveau' => 'required',

        ]);
  
        $offre->update($request->all());

        return redirect()->route('offres.index')->withStatus(__('Offre mise à jour avec succès'));
    }
    /**
     * Remove the specified offre from storage
     *
     * @param  \App\Offre  $offre
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Offre $offre)
    {
        $offre->delete();

        return redirect()->route('offres.index')->withStatus(__('Offre supprimée avec succès'));

    }

}

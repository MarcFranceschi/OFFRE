<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offre;

class offreController extends Controller
{
    //
    public function store(Request $request)
    {
        $offre = new Offre;
        $offre->Titre=$request->get('Titre');
        $offre->Description=$request->get('Description');
        $offre->Niveau=$request->get('Niveau');
        $offre->save();
    }
   
    public function list()
    {
    $offreslist = Offre::all();
    //dd($offreslist);
    return view('offres.list',compact('offreslist'));
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
    public function update(Request $request,Offre  $offre)
    {
        $offre = new Offre;
        $offre->Titre=$request->get('titre');
        $offre->Description=$request->get('description');
        $offre->Niveau=$request->get('niveau');
        $offre->save();


        return redirect()->route('offres')->withStatus(__('User successfully updated.'));
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

        return redirect()->route('offres')->withStatus(__('Offre supprimée.'));
    }
}

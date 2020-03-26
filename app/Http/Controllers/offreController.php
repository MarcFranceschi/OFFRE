<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offre;

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
        $offre->titre=$request->get('titre');
        $offre->description=$request->get('description');
        $offre->niveau=$request->get('niveau');
        $offre->save();
        return redirect()->route('offres.index')->with('success','Offre created successfully');

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
  
        return redirect()->route('offres.index')->with('success','Offre updated successfully');
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

        return redirect()->route('offres.index')->with('success','Offre deleted successfully');

    }

}

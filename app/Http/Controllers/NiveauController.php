<?php

namespace App\Http\Controllers;

use App\Niveau;
use Illuminate\Http\Request;

class NiveauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $niveaux = Niveau::latest()->paginate(5);

        return view('niveaux.index',compact('niveaux'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('niveaux.create');
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
            'libelle' => 'required',
        ]);

        Niveau::create($request->all());

        return redirect()->route('niveaux.index')
            ->with('success','Niveau created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Niveau $niveau)
    {
        return view('niveaux.show',compact('niveau'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Niveau $niveau)
    {
        return view('niveaux.edit',compact('niveau'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Niveau $niveau)
    {
        $request->validate([
            'libelle' => 'required',
        ]);

        $niveau->update($request->all());

        return redirect()->route('niveaux.index')
            ->with('success','Niveau updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Niveau $niveau)
    {
        $niveau->delete();

        return redirect()->route('niveaux.index')
            ->with('success','Niveau deleted successfully');
    }
}

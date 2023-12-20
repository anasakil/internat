<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use App\Models\AcceptStudent;
use App\Models\batiment;


use Illuminate\Http\Request;

class ChambreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chambres = Chambre::all();

        return view('chambres.index', compact('chambres'));

    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    public function create()
    {
        $batiments = Batiment::all(); // Retrieve the batiments data from your model

    return view('chambres.create', ['batiments' => $batiments]);
    }

    







    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'numbre' => 'required',
            'gender' => 'required',
            'capacity' => 'required|numeric',
            'batiment_id' => 'required|exists:batiments,id',
        ]);
    
        $chambre = Chambre::create($validatedData);
    
        // Additional logic or redirects after storing the chambre
    
        return redirect()->route('chambres.index')->with('success', 'Chambre created successfully');
    }


    public function getChambres(Request $request) {
        $batimentId = $request->input('batiment_id');
    
        $chambres = Chambre::where('batiment_id', $batimentId)->get();
    
        $options = '<option value="">Select a Room</option>';
        foreach ($chambres as $chambre) {
            $options .= "<option value='{$chambre->id}'>{$chambre->name}</option>";
        }
    
        return $options;
    }
    



    




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Batiment;


class BatimentController extends Controller
{

public function index()
{
    $batiments = Batiment::with('chambres')->get();

    return view('batiments.index', compact('batiments'));
}

  
    public function create()
    {
        return view('batiments.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nom' => 'required',
        ]);

        Batiment::create($request->all());

        return redirect()->route('batiments.index')
            ->with('success', 'Batiment created successfully');
    }

    public function edit($id)
    {
        $batiment = Batiment::find($id);
        return view('batiments.edit', compact('batiment'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nom' => 'required',
        ]);

        Batiment::find($id)->update($request->all());

        return redirect()->route('batiments.index')
            ->with('success', 'Batiment updated successfully');
    }

    public function destroy($id)
    {
        Batiment::find($id)->delete();
        return redirect()->route('batiments.index')
            ->with('success', 'Batiment deleted successfully');
    }
}

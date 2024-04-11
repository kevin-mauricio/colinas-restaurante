<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plato;
use App\Models\Categoria;
use App\Http\Requests\PlatoRequest;


class PlatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plates = Plato::all()->where('status', true);
        $categories = Categoria::all();
        $status_all = 'active';
        return view('view_plate_list', compact('plates', 'categories', 'status_all'));
    }

    public function getPlateByCategory(int $id_category)
    {
        $plates = Plato::where('id_categoria', $id_category)
                ->where('status', true)
                ->get();

        $categories = Categoria::all();
        $status = 'active';
        return view('view_plate_list', compact('plates', 'categories', 'status', 'id_category'));
    }


    public function createView()
    {
        $categories = Categoria::all();
        return view('view_plate_create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PlatoRequest $request)
    {
        Plato::create($request->all());
        return redirect()->route('index_plate')->with([
            'alert' => [
                'color' => 'success',
                'message' => 'Plate created'
            ]
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

    public function edit(Plato $plate)
    {
        $categories = Categoria::all();
        return view('view_plate_edit', compact('plate', 'categories'));
    }

    public function update(PlatoRequest $request, Plato $plate)
    {
        $plate->update($request->all());
        return redirect()->route('index_plate')->with([
            'alert' => [
                'color' => 'warning',
                'message' => 'Plate updated'
            ]
        ]); //alert
    }

    /**
     * Remove the specified resource from storage.
     */
    public function updateStatus(int $id)
    {   
        $currentPlate = Plato::findOrFail($id);
        $currentPlate->status = $currentPlate->status = false;
        $currentPlate->save();

        return redirect()->route('index_plate')->with([
            'alert' => [
                'color' => 'danger',
                'message' => 'Plate deleted'
            ]
        ]); // alert
    }
    public function destroy(Plato $plate)
    {
        $plate->update(['status' => false]);
        return redirect()->route('index_plate')->with([
            'alert' => [
                'color' => 'danger',
                'message' => 'Plate deleted'
            ]
        ]); // alert
    }
}

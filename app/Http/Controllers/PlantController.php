<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Plant;
use Illuminate\Support\Carbon;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Return all items
         $plantList = Plant::orderBy('name', 'ASC')->get();
         return $plantList;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newPlant = new Plant;
        $newPlant->name = $request->plant['name'];
        $newPlant->plantdesc = $request->plant['plantdesc'];
        $newPlant->family = $request->plant['family'];
        $newPlant->grow_season = $request->plant['grow_season'];
        $newPlant->grow_temp = $request->plant['grow_temp'];
        $newPlant->humidity = $request->plant['humidity'];
        $newPlant->img = $request->plant['img'];
        $newPlant->propagate = $request->plant['propagate'];
        $newPlant->sunlight = $request->plant['sunlight'];
        $newPlant->toxic = $request->plant['toxic'];
        $newPlant->water = $request->plant['water'];
        $newPlant->zone = $request->plant['zone'];
        $newPlant->save();
        return $newPlant;
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
        // $existingPlant = Plant::find($id);

        // if($existingPlant) {
        //     $existingPlant->completed = $request->plant['completed'] ? true : false;
        //     $existingPlant->completed_at = $request->plant['completed_at'] ? Carbon::now() : null;
        //     $existingPlant->save();
        //     return $existingPlant;
        // }
        // return "No Plants Found."
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existingPlant = Plant::find($id);

        if($existingPlant) {
            $existingPlant->delete();
            return "Plant ID card was deleted.";
        }
        return "Plant not found.";
    }
}

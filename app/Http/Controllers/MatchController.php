<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Match;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Match::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation for submit data
        $validated = $request->validate([
            "name" => "required",
            "year" => "required",
            "winner" => "required",
            "runnerup" => "required"
        ]);

        //return $validated;

        // Valid league names
        $validLeagues = array("Premier league","LA league","Seria A","Bundesliga","League 1");

        // Get match data from form
        $matchData = $request->all();

        // League name
        $leagueName = $matchData["name"];
        
        // Check if league name is valid
        if(in_array($leagueName,$validLeagues)){
            // Insert new data into database
            return Match::create($request->all());
        } else return view('welcome');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $year
     * @return \Illuminate\Http\Response
     */
    public function show($year)
    {
        return Match::where("year",$year)->get();
        
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

<?php

namespace App\Http\Controllers;

use App\Models\TeamEmployee;
use Illuminate\Http\Request;

class TeamEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       TeamEmployee::create($request->all());
       return "successfully";
    }

    /**
     * Display the specified resource.
     */
    public function show(TeamEmployee $teamEmployee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeamEmployee $teamEmployee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TeamEmployee $teamEmployee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeamEmployee $teamEmployee)
    {
        //
    }
}
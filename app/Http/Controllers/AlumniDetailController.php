<?php

namespace App\Http\Controllers;

use App\alumniDetail;
use Illuminate\Http\Request;

class AlumniDetailController extends Controller
{
    /**
     *
     * Show the form to login as an alumni
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view ('alumni.login');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\alumniDetail  $alumniDetail
     * @return \Illuminate\Http\Response
     */
    public function show(alumniDetail $alumniDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\alumniDetail  $alumniDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(alumniDetail $alumniDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\alumniDetail  $alumniDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, alumniDetail $alumniDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\alumniDetail  $alumniDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(alumniDetail $alumniDetail)
    {
        //
    }
}

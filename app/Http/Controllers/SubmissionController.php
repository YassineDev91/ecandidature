<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class SubmissionController extends Controller
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
        return Inertia::render('Submission/Create',['step' => 1]);
    }

    /**
     * Store personal information a newly created resource in storage.
     */
    public function store_personal_information(Request $request)
    {
        return Inertia::render('Submission/Create', ['step' => 2]);
    }

    /**
     * Store diplomas information a newly created resource in storage.
     */
    public function store_diplomas_information(Request $request)
    {
        return Inertia::render('Submission/Create', ['step' => 3]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

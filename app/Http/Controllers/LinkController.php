<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLinkRequest;
use App\Http\Requests\UpdateLinkRequest;

class LinkController extends Controller
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
    public function create(): View
    {
        return view('links.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLinkRequest $request)
    {
        /** @var User @user */

        $user = auth()->user();

        $user->links()->create($request->validated());

        return to_route('dashboard2');
    }

    /**
     * Display the specified resource.
     */
    public function show(Link $link)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Link $link)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Link $link)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link)
    {
        //
    }
}

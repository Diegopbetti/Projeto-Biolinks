<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\User; // Adicionado
use Illuminate\Http\Request;
use Illuminate\View\View; // Adicionado
use App\Http\Requests\StoreLinkRequest;
use App\Http\Requests\UpdateLinkRequest;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retornar todos os links do usuário autenticado
        $user = auth()->user();
        return view('links.index', ['links' => $user->links]);
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
        /** @var User $user */
        $user = auth()->user();

        // Criar um novo link associado ao usuário
        $user->links()->create($request->validated());

        return redirect()->route('dashboard2'); // Melhor prática para redirecionamento
    }

    /**
     * Display the specified resource.
     */
    public function show(Link $link): View
    {
        return view('links.show', ['link' => $link]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Link $link)   {
        return view('links.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLinkRequest $request, Link $link)
    {
        // $link->link = $request->link;
        // $link->name = $request->name;
        // $link->save();

        $link->fill($request->validated())->save();

        return to_route('dashboard2')
            ->with('message', 'Alterado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link)
    {
        // Verifica se o link pertence ao usuário autenticado
        if ($link->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $link->delete();

        return redirect()->route('dashboard2');
    }
}

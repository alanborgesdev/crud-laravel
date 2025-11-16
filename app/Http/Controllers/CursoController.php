<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use App\Http\Requests\CursoRequest;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cursos = Curso::all();

        return view('curso.index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('curso.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CursoRequest $request)
    {
        Curso::create($request->validated());

        return redirect()
            ->route('curso.index')
            ->with('success', 'Curso cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Curso $curso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curso $curso)
    {
        return view('curso.update', compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CursoRequest $request, Curso $curso)
    {
        $curso->update($request->validated());

        return redirect()
            ->route('curso.index')
            ->with('success', 'Curso atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curso $curso)
    {
        try {
            $curso->delete();

            return redirect()
                ->route('curso.index')
                ->with('success', 'Curso removido com sucesso!');

        } catch (\Exception $e) {
            return redirect()
                ->route('curso.index')
                ->with('error', 'Erro ao remover o curso. Tente novamente.');
        }
    }
}

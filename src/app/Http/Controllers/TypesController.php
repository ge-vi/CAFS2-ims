<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): InertiaResponse
    {
        return Inertia::render('Types/Index', [
            'types' => Type::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required','string','min:3','max:255'],
            'period' => ['required','numeric','min:1','max:65535']
        ]);

        Type::create($validated);

        return redirect(route('types.index'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        // $this->authorize('update', $type);

        $validated = $request->validate([
            'name' => ['required','string','min:3','max:255'],
            'period' => ['required','numeric','min:1','max:65535']
        ]);

        $type->update($validated);

        return redirect(route('types.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        // $this->authorize('delete', $type);

        $type->delete();

        return redirect(route('types.index'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\Types\StoreTypeRequest;
use App\Models\Type;
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
    public function store(StoreTypeRequest $request)
    {
        Type::create($request->validated());

        return redirect(route('types.index'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTypeRequest $request, Type $type)
    {
        // $this->authorize('update', $type);

        $type->update($request->validated());

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

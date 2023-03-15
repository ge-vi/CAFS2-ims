<?php

namespace App\Http\Controllers;

use App\Http\Requests\Types\StoreTypeRequest;
use App\Models\Type;
use Illuminate\Database\QueryException;
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

        return redirect()
            ->route('types.index')
            ->with('message', 'New item type was added.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTypeRequest $request, Type $type)
    {
        $validatedType = $request->validated();
        $type->update($validatedType);

        return redirect()
            ->route('types.index')
            ->with('message', sprintf('Type "%s" updated.', $validatedType['name']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        try {
            $type->delete();
        } catch (QueryException $e) {
            return redirect()
                ->route('types.index')
                ->with('message', sprintf('Type "%s" is in usage and could not be deleted.', $type->name));
        }

        return redirect()
            ->route('types.index')
            ->with('message', sprintf('Type "%s" was deleted.', $type->name));
    }
}

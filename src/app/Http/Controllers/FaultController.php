<?php

namespace App\Http\Controllers;

use App\Http\Requests\Faults\StoreFaultRequest;
use App\Http\Requests\Faults\UpdateFaultRequest;
use App\Models\Fault;
use App\Models\Owner;

class FaultController extends Controller
{
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
     */
    public function store(StoreFaultRequest $request)
    {
        $faultRequest = $request->validated();

        $owner = Owner::firstOrCreate(
            [
                'email' => $faultRequest['owner_email'],
            ],
            [
                'name' => $faultRequest['owner_name'],
                'phone' => $faultRequest['owner_phone'],
            ]);

        $fault = Fault::create([
            'name' => htmlspecialchars($faultRequest['fault_name']),
            'description' => htmlspecialchars($faultRequest['fault_description']),
            'owner_id' => $owner->id,
        ]);

        return redirect('/')
            ->with('message', 'Thank you. Item was registered under id: '.$fault->id.'. We will contact you within 2 working days.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fault  $fault
     * @return \Illuminate\Http\Response
     */
    public function show(Fault $fault)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fault  $fault
     * @return \Illuminate\Http\Response
     */
    public function edit(Fault $fault)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Faults\UpdateFaultRequest  $request
     * @param  \App\Models\Fault  $fault
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFaultRequest $request, Fault $fault)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fault  $fault
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fault $fault)
    {
        //
    }
}

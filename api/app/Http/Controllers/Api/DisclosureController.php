<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\DisclosureService as Service;

class DisclosureController extends Controller
{

    /**
     * Display a listing of the resource.
     * @param  Service $data;
     * @return \Illuminate\Http\Response
     */
    public function index(Service $data)
    {
        return $data->getAll();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Service $data
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Service $data)
    {   
        
        $validated = $request->validate([
            'name' =>  ['required', 'unique:disclosures', 'max:50'],
            'image' =>  ['required', 'unique:disclosures', 'max:255'],
            'about' =>  ['required', 'unique:disclosures', 'max:255']
        ]);

        $validated['user_id'] = Auth::user()->id;
        
        return $data->create($validated);
    }

    /**
     * Display the specified resource.
     *
     * @param  Service $data
     * @return \Illuminate\Http\Response
     */
    public function show(Service $data, $uuid)
    {
        return $data->getOnly($uuid);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Service $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $data, $uuid)
    {
        return $data->update($request, $uuid);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Service $data
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Service $data)
    {
        return $data->delete($id);
    }
}

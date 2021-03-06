<?php

namespace App\Http\Controllers\v1\Api;

use App\Http\Resources\v1\PersonResource;
use App\Models\Person;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PersonResourceCollection;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : PersonResourceCollection
    {
        return new PersonResourceCollection(Person::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required | email:unique',
            'phone' => 'required',
            'city' => 'required'
        ]);
        $person = Person::create($request->all());
        return respose([
            'message' => 'Person created successfully',
            'person' => $person
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) : PersonResource
    {
        return new PersonResource(Person::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) : PersonResource
    {
        return new PersonResource(Person::find($id)->update($request->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $person = Person::find($id);
        $person->delete();
        return response([
            'message' => 'Person deleted successfully'
        ]);
    }
}

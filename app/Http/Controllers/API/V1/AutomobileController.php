<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Automobile;
use App\Http\Requests\StoreAutomobileRequest;
use App\Http\Requests\UpdateAutomobileRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\AutomobileResource;
use App\Http\Resources\V1\AutomobileCollection;
use App\Filters\V1\AutomobilesFilter;
use Illuminate\Http\Request;


class AutomobileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $filter = new AutomobilesFilter();

        $queryItems = $filter->transform($request); //[[column,operator,value]]
           if(count($queryItems)==0){
               return new AutomobileCollection(Automobile::paginate());
             }else{
               return new AutomobileCollection(Automobile::where($queryItems)->paginate());
              }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAutomobileRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Automobile $automobile)
    {
        return new AutomobileResource($automobile);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Automobile $automobile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAutomobileRequest $request, Automobile $automobile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Automobile $automobile)
    {
        //
    }

    public function vehicleLists(Request $request)
    {

        $make = $request->make; 
        $vehiclelists = Automobile::where('name', 'like', '%'.$make.'%')->get();
        return new AutomobileCollection($vehiclelists);
    }
}

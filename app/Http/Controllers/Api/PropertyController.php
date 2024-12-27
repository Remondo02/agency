<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PropertyCollection;
use App\Http\Resources\PropertyResource;
use App\Models\Property;

class PropertyController extends Controller
{
    public function index()
    {
        // return PropertyResource::collection(Property::paginate(5));
        return PropertyResource::collection(Property::limit(5)->with('options')->get());
        // return new PropertyCollection(Property::limit(5)->with('options')->get());
        // Pour un bien en particulier
        // return new PropertyResource(Property::find(1));
    }
}

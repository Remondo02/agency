<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Weather;

class HomeController extends Controller
{


    public function __construct(private Weather $weather)
    {
    }

    public function index()
    {
        // dd($this->weather);
        $properties = Property::with('pictures')->available()->recent()->orderBy('created_at', 'desc')->limit(4)->get();

        // Example démontrant le changement de type sur l'attribut sold
        // dd($properties->first()->sold);

        // Example Accessors and Mutators sur la propriété name de l'utilisateur. (voir modèle User)
        // $user = User::first();
        // $user->name = 'Sally';
        // dd($user->name, $user);

        return view('home', [
            'properties' => $properties,
        ]);
    }
}

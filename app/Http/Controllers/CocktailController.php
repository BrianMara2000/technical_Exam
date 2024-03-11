<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CocktailController extends Controller
{
  public function showDetails($id)
  {
    $response = Http::get("https://www.thecocktaildb.com/api/json/v1/1/lookup.php?i=$id");

    if ($response->successful()) {
      $cocktail = $response->json()['drinks'][0];

      return view('cocktail-details', compact('cocktail'));
    } else {
      return abort(404);
    }
  }
}

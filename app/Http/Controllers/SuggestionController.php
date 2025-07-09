<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuggestionController extends Controller
{
    public function getSuggestions($category)
{
            $suggestions = [
            'Snacks' => ['Chips', 'Cookies', 'Granola Bars'],
            'Drinks' => ['Water', 'Juice', 'Soda'],
        ];
    return response()->json($suggestions[$category] ?? []);
}
}

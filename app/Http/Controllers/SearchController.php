<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Series;

class SearchController extends Controller
{
    
    public function index(Request $request)
        {
            $keyword = $request->input('q');
            $results = Series::where('title', 'like', '%' . $keyword . '%')
                            ->orWhere('content', 'like', '%' . $keyword . '%')
                            ->get();
            
            return view('search.index', compact('results', 'keyword'));
        }

    

}

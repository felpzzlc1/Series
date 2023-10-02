<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use App\Models\Series;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    public function index(Series $series)
    {
        $seasons = $series->seasons;
        return response()->json(['seasons' => $seasons]);
    }

    public function getEpisodes(Series $series)
    {
        $episodes = $series->episodes;
        return response()->json(['episodes' => $episodes]);
    }

    public function watched(Episode $episode, Request $request)
    {
        $episode->watched = $request->watched;
        $episode->save();

        return response()->json($episode);
    }
}

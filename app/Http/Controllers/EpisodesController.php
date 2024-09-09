<?php


namespace App\Http\Controllers;

use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EpisodesController extends Controller
{
    public function index(Request $request, Season $season)
    {

            return view('episodes.index', [
            'season' => $season,
            'episodes' => $season->episodes,
            'mensagemSucesso' => session('mensagem.sucesso')
        ]);
    }

    public function update(Request $request, Season $season)
{
    $watchedEpisodes = $request->episodes;

    DB::transaction(function () use ($season, $watchedEpisodes) {
        $currentlyWatched = $season->episodes()->where('watched', true)->pluck('id')->toArray();

        $toUnwatch = array_diff($currentlyWatched, $watchedEpisodes);

        $toWatch = array_diff($watchedEpisodes, $currentlyWatched);

        if (!empty($toUnwatch)) {
            DB::table('episodes')
                ->where('season_id', $season->id)
                ->whereIn('id', $toUnwatch)
                ->update(['watched' => false]);
        }

        if (!empty($toWatch)) {
            DB::table('episodes')
                ->where('season_id', $season->id)
                ->whereIn('id', $toWatch)
                ->update(['watched' => true]);
        }
    });
 
    return to_route('episodes.index', $season)->with('mensagem.sucesso', 'Episódios marcados como assistidos.');
}

}
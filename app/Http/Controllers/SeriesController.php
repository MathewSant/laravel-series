<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Autenticador;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Repositories\SeriesRepository;
use Illuminate\Http\Request;

//use Adrianorosa\GeoLocation\GeoLocation;

class SeriesController extends Controller
{

    public function __construct(private SeriesRepository $seriesRepository)
    {
        $this->middleware(Autenticador::class)->except(['index']);
    }
    
    public function index(Request $request)
    {               
        //$series = Serie::query()->orderBy('nome')->get();
        $series = Series::all();
        
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');

        return view('series.index')->with('series', $series)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function edit(Series $series)
    {
        return view('series.edit')->with('series', $series);
    }

    public function update(Series $series, SeriesFormRequest $request)
    {
        // Se eu quiser adicionar tudo no mass assigment:
        $series->update($request->all());

        // Se eu quiser adicionar um por um:
        //$series->nome = $request->nome;
        //$series->save();

        return to_route('series.index')->with('mensagem.sucesso', "Série '{$series->nome}' atualizada com sucesso.");
    }

    public function store(SeriesFormRequest $request)
    {   
            $serie = $this->seriesRepository->add($request);


      
            return to_route('series.index')->with('mensagem.sucesso', "Série '{$serie->nome}' criada com sucesso.");
     
    }

    public function destroy(Series $series, Request $request)
    {

        $series->delete();
        
        return to_route('series.index')->with('mensagem.sucesso', "Série '{$series->nome}' removida com sucesso");
    }
}

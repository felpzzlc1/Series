<?php

namespace App\Http\Controllers;

use App\Events\SeriesCreated as SeriesCreatedEvents;
use App\Http\Requests\SeriesFormRequest;
use App\Mail\SeriesCreated;
use App\Models\Series;
use App\Models\User;
use App\Repositories\SeriesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $repository)
    {
        $this->middleware('auth')->except('index');
    }

    public function index(Request $request)
    {
        $search = request()->input('search');

            if ($search) {
                $series = Series::where('nome', 'like', '%' . $search . '%')->get();
            } else {
                $series = Series::all();
            }

        $mensagemSucesso = session('mensagem.sucesso');

        return view('series.index',['series' => $series, 'search' => $search])->with('series', $series)
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {   
        //Este if verifica se existe uma imagem inserida no input, se o retorno for positivo ele cria a série com a capa selecionada
        //se for negativo ele utiliza o arquivo padrão "no_cover.gif" que fica armazenado na pasta storage/app/public/series_cover.
        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('series_cover', 'public');
            $request->coverPath = $coverPath;
        } else {
            $request->coverPath = 'series_cover/no_cover.gif';
        }

        $request->validate([
            // Outras regras de validação existentes
            'descricao' => 'nullable|string', // Defina as regras apropriadas para a descrição
        ]);

        $serie = $this->repository->add($request);

        SeriesCreatedEvents::dispatch(
          $serie->nome,
          $serie->id,
          $request->seasonsQty,
          $request->episodesPerSeason,
          $request->coverPath,
          $serie->descricao
        );

        //dd(request()->all());
        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$serie->nome}' adicionada com sucesso");
    }

    public function destroy(Series $series)
    {
        $series->delete();

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->nome}' removida com sucesso");
    }

    public function edit(Series $series)
    {
        return view('series.edit')->with('serie', $series);
    }

    public function update(Series $series, SeriesFormRequest $request)
    {
        $series->fill($request->all());
        $series->save();

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->nome}' atualizada com sucesso");
    }
}
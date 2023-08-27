<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
   public function index(Series $series)
   {
      $serie =  $series->all();

      $mensagemSucesso = session('mensagem.sucesso');

      return  view('series.index')
         ->with('series', $serie)
         ->with('mensagemSucesso', $mensagemSucesso);
   }

   public function create() // metodo create redireciona muda a pagina
   {
      return view('series.create');
   }

   public function store(SeriesFormRequest $request) //metodo store criar novo dado no banco
   {     
      
      $serie = Series::create($request->all());

      $season = [];
      for ($i=1; $i <= $request->seasonsQty ; $i++) { 
         $season[] = [
            'series_id' => $serie->id,
            'number' => $i
         ];
      }
     
      Season::insert($season);

      $episodes = [];
      foreach ($serie->seasons as  $season) {
         for ($j=1; $j <= $request->epsodesPerSeason ; $j++) { 
               $episodes[] = [
                  'season_id' => $season->id,
                  'number' => $j
               ];
         }
      }
     
   Episode::insert($episodes);
      
   
      return  to_route('series.index')
         ->with('mensagem.sucesso', "Série '{$serie->nome}' adiconada com sucesso");
   }

   public function destroy(Series $series)
   {
      $series->delete();
      return to_route('series.index')
         ->with('mensagem.sucesso', "Série '{$series->nome}' removida com sucesso");
   }

   public function edit(Series $series)
   {
      // dd($series->temporadas);
      return view('series.edit')->with('serie', $series);
   }

   public function update(Series $series, SeriesFormRequest $request)
   {

      $series->fill($request->all());
      $series->save();
      return to_route('series.index')->with('mensagem.sucesso', "Séries '{$series->nome}' atualizada com sucesso");
   }
}

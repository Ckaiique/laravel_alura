<x-layout title="Séries">

    <a href="/series/criar" class="btn btn-dark m-2">Adicionar</a>
    <ul class="list-group">
         @foreach ($series as $key => $serie)
            <li class="list-group-item"> {{$serie->nome}} </li>
         @endforeach
     </ul>
</x-layout>
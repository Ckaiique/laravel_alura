<x-layout title="Nova Séries">
    <form action="{{route('series.store')}}" method="post">
        @csrf


        <div class="row mb-3">


                <div class="col-8">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type  = "text" 
                            autofocus
                           id    = "nome" 
                           name  = "nome" 
                           class = "form-control"
                          value="{{old('nome')}}" >
                </div>
            
            

                <div class="col-2">
                    <label for="seasonsQty" class="form-label">Nº Temporadas:</label>
                    <input type  = "text" 
                           id    = "seasonsQty" 
                           name  = "seasonsQty" 
                           class = "form-control"
                          value="{{old('seasonsQty')}}" >
                </div>
            
            

                <div class="col-2">
                    <label for="episodesPerSeason" class="form-label">Eps / Temporada:</label>
                    <input type  = "text" 
                           id    = "epsodesPerSeason" 
                           name  = "epsodesPerSeason" 
                           class = "form-control"
                          value="{{old('epsodesPerSeason')}}" >
                </div>
            
            
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
    
    </form>



    
</x-layout>
@extends('pages.layouts.master')

@section('content')
@if(Session::has('success'))
  <div class="alert alert-success" role="alert">
      {{Session::get('success')}}
  </div>
@endif



<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <span>Liste des référentiels</span>
                    <a class="float-end btn" href="{{url('referentiels/ajouter')}}">
                    <span > <i class="bi bi-plus-circle"></i></span>
                    <span>Ajouter</span>
                    </a>
                    
                    <form class="form-inline ms-auto mt-3 mb-3 mt-lg-3 " method="GET" action="{{url('referentiels/rechercher')}}">
        <div class="input-group my-3 my-lg-0">
          <input type="text" class="form-control" name="recherche" placeholder="rechercher" aria-label="recherche" aria-describedby="button-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit" id="button-addon2"><i class="bi bi-search"></i></button>
          </div>
        </div>
      </form>
                    
                </div>
                <div class="card-body">
                    <div class="list-group">
                        @if (count($referentiel) == 0)
                            <h5>Aucun référentiel n'a été enregister</h5>
                        @else
                            @foreach ($referentiel as $ref)
                            <a href="{{url('referentiels/'.$ref->id.'/details')}}" class="list-group-item list-group-item-action ">{{$ref->libelle}}
                            <span><i class="btn btn-success float-end bi bi-three-dots ms-2"></i></span>
                            </a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection







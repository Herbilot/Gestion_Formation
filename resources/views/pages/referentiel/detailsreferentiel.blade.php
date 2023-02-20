@extends('pages.layouts.master')

@section('content')
@section('content')
@if(Session::has('success'))
  <div class="alert alert-success" role="alert">
      {{Session::get('success')}}
  </div>
@endif
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4>Details du référentiel: {{$referentiel->libelle}}</h4>
                </div>
                <div class="card-body">
                    <h5>Validated: <small>{{$validated}}</small></h5>
                    <h5>Horaires: <small>{{$referentiel->horaire}} heures</small></h5>
                    <h5>Types: <small>{{$type->libelle}}</small> </h5>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6">
                        <h4>Liste des formations associées </h4>
                        </div>
                        <div class="col-lg-6">
                        <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <span><i class="bi bi-link-45deg"></i></span>
                        <span>associer une nouvelle formation</span>
                    </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($referentiel->formation as $formation)
                        <li class="list-group-item">{{$formation->nom}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selectionner une formation dans la liste</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{url('referentiels/'.$referentiel->id.'/ajout-formation')}}">
        <div class="form-group">
        <select name="formation" class="form-control" id="formation" value="{{old('formation')}}">
            @foreach ($formations as $formation)
            <option value="{{$formation->id}}">{{$formation->nom}}</option>
            @endforeach
        </select>
        @error('formation')
        <div class="alert alert-danger" role="alert">
        {{$message}}
        </div>
        @enderror
    </div>
        
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

@endsection
@extends('pages.layouts.master')

@section('content')
@if(Session::has('success'))
  <div class="alert alert-success" role="alert">
      {{Session::get('success')}}
  </div>
@endif
<div class="container-fluid">
<div class="row">
    <div class="">
    <div class="card">
        <div class="card-header">
            Liste des Formations
            <form class="form-inline ms-auto my-2 my-lg-0" method="GET" action="{{url('formations/rechercher')}}">
        <div class="input-group my-3 my-lg-0">
          <input type="text" class="form-control" name="recherche" placeholder="rechercher" aria-label="recherche" aria-describedby="button-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit" id="button-addon2"><i class="bi bi-search"></i></button>
          </div>
        </div>
      </form>
        </div>
        <div class="card body">
        <table class="table table-striped mt-3">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Description</th>
      <th scope="col">Durée</th>
      <th scope="col">Date de début</th>
      <th scope="col">Is started</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($formations as $formation)
    <tr>
      <td>{{$formation->nom}}</td>
      <td>{{$formation->description}}</td>
      <td>{{$formation->duree}}</td>
      <td>{{$formation->dateDebut}}</td>
      <td>{{$formation->isStarted}}</td>
      <td>
        <a class="btn btn-primary" href="{{ url('formations/'.$formation->id.'/modifier') }}">
        <span><i class="bi bi-pencil ms-2"></i></span>
        </a>

        <a class="btn btn-danger" href="{{ url('formations/'.$formation->id.'/supprimer') }}">
        <span><i class="bi bi-trash3 ms-2"></i></span>
        </a>

        <a class="btn btn-success" href="{{ url('formations/'.$formation->id.'/details') }}">
        <span><i class="bi bi-three-dots ms-2"></i></span>
        </a> 
      </td>
    </tr>
    @endforeach
   
  </tbody>
</table>
        </div>
    </div>
</div>
</div>
</div>
@endsection


      
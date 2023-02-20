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
            Liste des candidats
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
      <th scope="col">Prénom</th>
      <th scope="col">Nom</th>
      <th scope="col">Email</th>
      <th scope="col">Age</th>
      <th scope="col">Sexe</th>
      <th scope="col">Niveau d'étude</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($candidats as $candidat)
    <tr>
      <td>{{$candidat->nom}}</td>
      <td>{{$candidat->prenom}}</td>
      <td>{{$candidat->email}}</td>
      <td>{{$candidat->age}}</td>
      <td>{{$candidat->sexe}}</td>
      <td>{{$candidat->niveauEtude}}</td>
      <td>
        <a class="btn btn-primary" href="{{ url('candidats/'.$candidat->id.'/modifier') }}">
        <span><i class="bi bi-pencil ms-2"></i></span>
        </a>

        <a class="btn btn-danger" href="{{ url('candidats/'.$candidat->id.'/supprimer') }}">
        <span><i class="bi bi-trash3 ms-2"></i></span>
        </a>

        <a class="btn btn-success" href="{{ url('candidats/'.$candidat->id.'/details') }}">
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
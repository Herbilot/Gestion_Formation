@extends('pages.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <h3>{{$candidat->nom}} {{$candidat->prenom}}</h3>  
                </div>
                <div class="card-body">
                  <div class="col-lg-6">
                    <h5>Liste des formations</h5>
                  <table class="table">
                    <thead class="table-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Referentiel</th>
      <th scope="col">Type</th>
      <th scope="col">Date d'inscription</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>14/02/2023</td>
    </tr>
  
  </tbody>
</table>
                  </div>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
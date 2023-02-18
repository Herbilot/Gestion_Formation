@extends('pages.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Les des formations
                </div>
                <div class="card-body">
                <table class="table table-striped mt-3">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Description</th>
      <th scope="col">Durée</th>
      <th scope="col">Date de début</th>
      <th scope="col">Is started ?</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td >Larry the Bird</td>
      <td>@twitter</td>
      <td>@mdo</td>
      <td>@mdo</td>
      
    </tr>
  </tbody>
</table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
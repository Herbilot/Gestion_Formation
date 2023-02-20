@extends('pages.layouts.master')


@section('content')
<div class="container-fluid">

  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-6">
              <h4><small>Table des référentiels associés à la formation: </small> {{$formation->nom}} </h4>
            </div>
            <div class="col-lg-6">
              <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <span><i class="bi bi-link-45deg"></i></span>
                <span>associer un nouveau référentiel</span>
              </button>
            </div>
          </div>
        </div>
        <div class="card-body">
          <ul class="list-group">
            @foreach ($formation->referentiel as $referentiel)
            <li class="list-group-item list-group-item-action ">{{$referentiel->libelle}}</li>
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
        <h5 class="modal-title" id="exampleModalLabel">Selectionner un referentiel dans la liste</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{url('formations/'.$formation->id.'/ajout-referentiel')}}">
          <div class="form-group">
            <select name="formation" class="form-control" id="formation" value="{{old('formation')}}">
              @foreach ($referentiels as $referentiel)
              <option value="{{$referentiel->id}}">{{$referentiel->libelle}}</option>
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
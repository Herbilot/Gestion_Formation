@extends('pages.layouts.master')

@section('content')
<div class="row ms-5">
            <div class="col-lg-6">
                <h2>Ajouter une formation</h2>
                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                @endif
                <form method="post" action="{{url('candidats/enregistrer')}}">
                    @csrf
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input name="nom" type="text" class="form-control" id="nom" placeholder="Entrez le nom de la formation"
                        value="{{old('nom')}}">
                        @error('nom')
                        <div class="alert alert-danger" role="alert">
                        {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input name="description" type="text" class="form-control" id="description" placeholder="Entrez une description"
                        value="{{old('description')}}">
                        @error('description')
                        <div class="alert alert-danger" role="alert">
                        {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="duree">Durée</label>
                        <input name="duree" type="text" class="form-control" id="duree" placeholder="2 ans"
                        value="{{old('duree')}}">
                        @error('duree')
                        <div class="alert alert-danger" role="alert">
                        {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="debut">Date de début</label>
                        <input name="debut" type="date" class="form-control" id="debut" placeholder="18/02/2023" value="{{old('debut')}}">
                        @error('debut')
                        <div class="alert alert-danger" role="alert">
                        {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="sexe">Is started ?</label>
                        <select name="sexe" class="form-control" id="sexe" value="{{old('sexe')}}">
                        <option>Oui</option>
                        <option>Non</option>
                        </select>
                        @error('sexe')
                        <div class="alert alert-danger" role="alert">
                        {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary mt-3" type="submit">Enregistrer </button>
                    <a href="{{url('projects')}}" class="btn btn-danger mt-3">Annuler</a>
                </form>
            </div>
        </div>

@endsection
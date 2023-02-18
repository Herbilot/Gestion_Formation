@extends('pages.layouts.master')

@section('content')
<div class="row ms-5">
            <div class="col-lg-6">
                <h2>Ajouter un candidat</h2>
                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                @endif
                <form method="post" action="{{url('candidats/enregistrer')}}">
                    @csrf
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input name="nom" type="text" class="form-control" id="nom" placeholder="Entrez votre nom"
                        value="{{old('nom')}}">
                        @error('nom')
                        <div class="alert alert-danger" role="alert">
                        {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input name="prenom" type="text" class="form-control" id="prenom" placeholder="Entrez votre prénom"
                        value="{{old('prenom')}}">
                        @error('prenom')
                        <div class="alert alert-danger" role="alert">
                        {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name="email" type="text" class="form-control" id="email" placeholder="email@exemple.com"
                        value="{{old('email')}}">
                        @error('prenom')
                        <div class="alert alert-danger" role="alert">
                        {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input name="age" type="number" class="form-control" id="age" placeholder="18"
                        max=35 min=12 value="{{old('age')}}">
                        @error('prenom')
                        <div class="alert alert-danger" role="alert">
                        {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="sexe">Sexe</label>
                        <select name="sexe" class="form-control" id="sexe" value="{{old('sexe')}}">
                        <option>Homme</option>
                        <option>Femme</option>
                        </select>
                        @error('sexe')
                        <div class="alert alert-danger" role="alert">
                        {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="niveauEtude">Niveau d'étude</label>
                        <select name="niveauEtude" class="form-control" id="niveauEtude" value="{{old('niveauEtude')}}">
                        <option>Baccalauréat</option>
                        <option>bac +1</option>
                        <option>bac +2</option>
                        <option>bac +3</option>
                        <option>bac +4</option>
                        <option>bac +5</option>
                        </select>
                        @error('niveauEtude')
                        <div class="alert alert-danger" role="alert">
                        {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary mt-3" type="submit">Save </button>
                    <a href="{{url('candidats')}}" class="btn btn-danger mt-3">Cancel</a>
                </form>
            </div>
        </div>

@endsection
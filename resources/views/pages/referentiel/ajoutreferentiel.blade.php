@extends('pages.layouts.master')

@section('content')
<div class="row ms-5">
    <div class="col-lg-6">
        <h2>Ajouter un Référentiel</h2>
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
        @endif
        <form method="post" action="{{url('referentiels/enregistrer')}}">
            @csrf
            <div class="form-group">
                <label for="libelle">Libellé</label>
                <input name="libelle" type="text" class="form-control" id="libelle" placeholder="Entrez le nom du référentiel" value="{{old('libelle')}}">
                @error('libelle')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="validated">Validated ?</label>
                <select name="validated" class="form-control" id="validated" value="{{old('validated')}}">
                    <option>1</option>
                    <option>0</option>
                </select>
                @error('validated')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="horaire">Horaire</label>
                <input name="horaire" type="number" class="form-control" id="horaire" placeholder="40" value="{{old('horaire')}}">
                @error('type')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <input name="type" type="text" class="form-control" id="type" value="{{old('type')}}">
                @error('type')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
            </div>
            <button class="btn btn-primary mt-3" type="submit">Enregistrer </button>
            <a href="{{url('referentiels')}}" class="btn btn-danger mt-3">Annuler</a>
        </form>
    </div>
</div>

@endsection
@extends('pages.layouts.master')

@section('content')
<div class="row ms-5">
    <div class="col-lg-6">
        <h2>{{$titre}}</h2>
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
        @endif
        <form method="post" action="{{$fun}}">
            @csrf
            <div class="form-group">
                <label for="nom">Nom</label>
                <input name="nom" type="text" class="form-control" id="nom" placeholder="Entrez le nom de la formation" value="{{$parm1}}">
                @error('nom')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input name="description" type="text" class="form-control" id="description" placeholder="Entrez une description" value="{{$parm2}}">
                @error('description')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="duree">Durée</label>
                <input name="duree" type="text" class="form-control" id="duree" placeholder="2 ans" value="{{$parm3}}">
                @error('duree')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="debut">Date de début</label>
                <input name="debut" type="date" class="form-control" id="debut" value="{{$parm4}}">
                @error('debut')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="isStarted">Is started ?</label>
                <select name="isStarted" class="form-control" id="isStarted" value="{{$parm5}}">
                    <option>1</option>
                    <option>0</option>
                </select>
                @error('isStarted')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
            </div>
            <button class="btn btn-primary mt-3" type="submit">Enregistrer </button>
            <a href="{{url('formations')}}" class="btn btn-danger mt-3">Annuler</a>
        </form>
    </div>
</div>

@endsection
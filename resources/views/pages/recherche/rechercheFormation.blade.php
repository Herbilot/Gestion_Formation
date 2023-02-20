@extends('pages.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h3>{{count($resultat)}} résultat trouvé(s)</h3>
        </div>
        <div class="card">
            <div class="card-body">
               <table>
                @foreach ($resultat as $formation)
                    <tbody>
                        <tr>
                            <td><a href="{{url('formations/'.$formation->id.'/details')}}">{{$formation->nom}}</a></td>
                        </tr>
                    </tbody>
                @endforeach
               </table>


            </div>

        </div>

    </div>

</div>
@endsection


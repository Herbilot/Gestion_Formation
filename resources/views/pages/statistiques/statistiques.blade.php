@extends('pages.layouts.master')

@section('content')
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 fw-bold fs-3">
          Tableau de bord
        </div>
      </div>
      <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Nombre de Candidats par formation</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Voir Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body"> Nombre de formation par référentiels</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Voir Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Répartition total des candidats par sexe</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Repartion des formations par type</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>

      <div class="row">
        <div class="col-md-6 mb-3 h-100">
          <div class="card">
            <div class="card-header">
              Tranches d'ages
            </div>
            <div class="card-body">
              <canvas class="chart" id="myBarChart"></canvas>
            </div>
          </div>
        </div>

        
        
        <div class="col-md-6 mb-3 h-100">
          <div class="card">
            <div class="card-header">
              Repartition par sexe
            </div>
            <div class="card-body">
              <canvas class="chart" id="myAreaChart"></canvas>
            </div>
          </div>
        </div>
      </div>
      
    <div class="row">
    <div class="col-md-6 mb-3 h-100">
          <div class="card">
            <div class="card-header">
              Repartition par sexe
            </div>
            <div class="card-body">
              <canvas class="chart" id="ctx"></canvas>
            </div>
          </div>
        </div>

    </div>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script type="text/javascript">
	var _yAgeData=JSON.parse('{!! json_encode($ages) !!}');
	var _xAgeData=JSON.parse('{!! json_encode($ageCpt) !!}');

  var _ySexeData=JSON.parse('{!! json_encode($sexes) !!}');
  var _xSexeData=JSON.parse('{!! json_encode($sexeCpt) !!}');
</script>
<script src="{{asset('assets/age.js')}}"></script>
<script src="{{asset('assets/sexe.js')}}"></script>
<script src="{{asset('assets/test.js')}}"></script>
    @endsection
  <!-- end main section -->


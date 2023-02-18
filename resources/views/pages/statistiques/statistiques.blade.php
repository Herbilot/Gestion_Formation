@extends('pages.layouts.master')

@section('content')
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 fw-bold fs-3">
          Tableau de bord
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 mt-3 mb-3">
          <div class="card text-white bg-primary h-100">
            <div class="card-header">Header</div>
            <div class="card-body">
              <h5 class="card-title">Primary card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 mt-3 mb-3">
          <div class="card text-white bg-success  h-100">
            <div class="card-header">Header</div>
            <div class="card-body">
              <h5 class="card-title">Primary card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 mt-3 mb-3">
          <div class="card text-white bg-danger h-100">
            <div class="card-header">Header</div>
            <div class="card-body">
              <h5 class="card-title">Primary card title</h5>
              <p class="card-text">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temport dolore magna aliqua.

            </div>
          </div>
        </div>
        <div class="col-md-3 mt-3 mb-3">
          <div class="card text-white bg-warning mb-3 h-100">
            <div class="card-header">Header</div>
            <div class="card-body">
              <h5 class="card-title">Primary card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script type="text/javascript">
	var _yAgeData=JSON.parse('{!! json_encode($ages) !!}');
	var _xAgeData=JSON.parse('{!! json_encode($ageCpt) !!}');

  var _ySexeData=JSON.parse('{!! json_encode($sexes) !!}');
  var _xSexeData=JSON.parse('{!! json_encode($sexeCpt) !!}');
</script>
<script src="{{asset('assets/age.js')}}"></script>
<script src="{{asset('assets/sexe.js')}}"></script>
    @endsection
  <!-- end main section -->


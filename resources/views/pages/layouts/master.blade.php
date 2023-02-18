<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tableau de bord</title>
  <!-- bootstap link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <!-- end bootstap link -->

  <!-- custom css  -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >
  <!-- end custom css -->

</head>

<body>
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <!-- offcanvas trigger -->
    <button class="navbar-toggler me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- end offcanvas trigger -->
    <a class="navbar-brand fw-bold text-uppercase me-auto px-3" href="#">Herbidev Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <form class="form-inline ms-auto my-2 my-lg-0">
        <div class="input-group my-3 my-lg-0">
          <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button" id="button-addon2"><i class="bi bi-search"></i></button>
          </div>
        </div>
      </form>
      <ul class="navbar-nav">
        <div class="dropdown">
          <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-circle"></i>
          </a>

          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </div>
      </ul>
    </div>
  </nav>
  <!-- end navbar -->

  <!-- offcanvas -->
  <div class="offcanvas offcanvas-start side-bar bg-dark text-white" data-bs-backdrop="false" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-body p-0">
      <!-- navigation items -->
      <nav navbar-dark>
        <ul class="navbar-nav">
          <li>
            <div class="text-muted small fw-bold text-uppercase px-3 mt-3">statistiques</div>
          </li>
          <li>
            <a class="nav-link px-3" href="{{ url('tableau-bord') }}">
              <span class="me-2"><i class="bi bi-speedometer2"></i></span>
              <span>Tableau de bord</span>
            </a>
          </li>
          <li class="my-4">
            <hr class="dropdown-divider">
          </li>
          <li>
            <div class="text-muted small fw-bold text-uppercase px-3">interfaces</div>
          </li>
          <!-- formation -->
          <li>
            <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              <span class="me-2"><i class="bi bi-book-half"></i></span>
              <span>Formations</span>
              <span class="right-icon ms-auto"><i class="bi bi-chevron-down"></i></span>
            </a>
            <div class="collapse" id="collapseExample">
              <ul class="navbar-nav ps-3">
                <li>
                  <a class="nav-link px-3" href="{{ url('formations') }} ">
                    <span class="me-2"><i class="bi bi-bookshelf"></i></span>
                    <span class="formation-item">Voir toutes formations</span>
                  </a>
                </li>
                <li>
                  <a class="nav-link px-3" href="{{ url('formations/ajouter') }}">
                    <span class="me-2"><i class="bi bi-plus-circle"></i></i></span>
                    <span class="formation-item">Ajouter une formation</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <!-- end formation -->

          <!-- candidat -->
          <li class="mt-3">
            <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              <span class="me-2"><i class="bi bi-book-half"></i></span>
              <span>Candidats</span>
              <span class="right-icon ms-auto"><i class="bi bi-chevron-down"></i></span>
            </a>
            <div class="collapse" id="collapseExample">
              <ul class="navbar-nav ps-3">
                <li>
                  <a class="nav-link px-3" href="{{ url('candidats') }}">
                    <span class="me-2"><i class="bi bi-people-fill"></i></span>
                    <span class="formation-item">Voir tous les candidats</span>
                  </a>
                </li>
                <li>
                  <a class="nav-link px-3" href="{{ url('candidats/ajouter') }}">
                    <span class="me-2"><i class="bi bi-plus-circle"></i></span>
                    <span class="formation-item">Ajouter un candidat</span>
                  </a>
                </li>

              </ul>
            </div>
          </li>
          <!-- end candidat -->
          <li class="my-4">
            <hr class="dropdown-divider">
          </li>
        </ul>
      </nav>
      <!-- end navigation items -->
    </div>
  </div>
  <!-- end offcanvas -->

  <!-- main section -->
  <main class="mt-5 pt-3">
    @yield('content')
  </main>
  <!-- end main section -->

  <!-- bootstap js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!-- end bootstap js -->
  <script src="{{asset('public')}}/js/scripts.js"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
</body>

</html>

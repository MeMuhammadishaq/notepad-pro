<!doctype html>
<html lang="en">

<head>
  <title>Notepad</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  {{-- fontawesome --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        
        <div class="container-fluid">
          @auth
          <a class="navbar-brand" href="{{url('/')}}">Home <i class="fa-solid fa-house"></i></a>
          @endauth
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <li class="nav-item">
                      @auth
                        <a class="nav-link active" aria-current="page" href="{{url('/ck')}}">Add <i class="fa-solid fa-plus"></i></i></a>
                       
                      </li>
                    <a class="nav-link active" aria-current="page" href="#">{{auth()->user()->name}} <i class="fa-solid fa-user"></i></a>
                  </li>
                  <li class="nav-item">
                    @endauth
                    @auth
                    <div>
                        <a class="nav-link active" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                            Logout <i class="fa-solid fa-right-from-bracket"></i>
                        </a>
    
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                    @endauth
                </li>
                 
                    
              <li class="nav-item">
                @guest
                <a class="nav-link active" aria-current="page" href="{{url('/register')}}">Register <i class="fa-solid fa-registered"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{url('/login')}}">Login <i class="fa-solid fa-right-to-bracket"></i></a>
              </li>
              @endguest
             
            </ul>
          </div>
          
             @auth
               
             
            <form class="d-flex"action="{{url('show')}}"method="get">
              @csrf
              <input class="form-control me-2" type="search"name="search" value="{{isset($search) ?$search: ''}}" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            @endauth
          </div>
        </div>
      </nav>
   
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>
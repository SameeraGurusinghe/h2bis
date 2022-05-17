<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>H2bis - Supplier</title>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="index.js"></script>
  <script>
    $(document).ready( function () {
      $('#table_id').DataTable();
    } );
    
  </script>

  <style>
    .error {
      color: red !important
    }
    .dash{
      height: 400px;
      justify-content: center;
      align-items: center;
      font-size: 20px;
      font-weight: bold;
      display: flex;
      color:green;
      flex-direction: column;
    }

    .flex-parent {
      display: flex;
    }

    .jc-center {
      justify-content: right;
      margin: 2px 0px 15px 0;
    }
  </style>

</head>

<body class="antialiased">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">H2bis - Supplier</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      </ul>
      <form class="d-flex">

        <div class="nav-item dropdown flex-row-reverse">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          @if(\Auth::check())
            {{\Auth::user()->email}}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">sss</a></li>
            <li><a class="dropdown-item" href="#">sss</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a href="{{url('logout')}}">Logout</a></li>
            <!-- Check user is logged in -->
            @endif
          </ul>
  </div>
      </form>
    </div>
  </div>
</nav>
<br>
  <div class="container">
  
    <!-- main app container -->
    <div class="readersack">
      <div class="container">
        <div class="row"><hr/>

          <div class="flex-parent jc-center">
            <a href="{{url('createSupplier')}}" class="btn btn-light"><img src="/icons/plus.png" style="width:40px; height:40px;"></a>
          </div>
          <hr/>

            <table id="table_id" class="display">
              <thead>
                  <tr>
                      <th>Supplier Type</th>
                      <th>Supplier Code</th>
                      <th>Supplier Name</th>
                      <th>Reference No</th>
                      <th>Contact No</th>
                      <th>Email</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($supplier_info as $data)
                  <tr>
                      <td>{{$data->suppliers_type}}</td>
                      <td>{{$data->supplier_code}}</td>
                      <td>{{$data->supplier_name}}</td>
                      <td>{{$data->reference_number}}</td>
                      <td>{{$data->mobile_number}}</td>
                      <td>{{$data->email}}</td>
                      <td>
                      <a href=""><img src="/icons/eye.png" style="width:20px; height:20px;"></a>
                      <a href=""><img src="/icons/pen.png" style="width:20px; height:20px;"></a>
                      <a href="delete/{{ $data->id }}"><img src="/icons/remove.png" style="width:20px; height:20px;"></a>
                      </td>
                  </tr>
                @endforeach
              </tbody>
          </table>

          </div>
        </div>
      </div>
    </div>
  </div>
    
</body>
</html>
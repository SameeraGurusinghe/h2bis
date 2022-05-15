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
  <script type="text/javascript" src="index.js"></script>

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
  </style>

</head>

<body class="antialiased" style="background-color: lightblue;">
  <div class="container">
  
    <!-- main app container -->
    <div class="readersack">
      <div class="container">
        <div class="row">
          <div class="col-md-6 offset-md-3" style="text-align:center">
            <h3>H2bis - Supplier</h3>

               <!-- Show any success message -->
            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif
          <!-- Show any success message -->

            <!-- Check user is logged in -->
            @if(\Auth::check())
              <div class='dash'>You are logged in as  : {{\Auth::user()->email}} ,  <a href="{{url('logout')}}"> Logout</a></div> 
            @else
            <div class='dash '>
              <div class='error'> You are not logged in  </div>
              <div>  <a href="{{url('login')}}">Login</a> | <a href="{{url('register')}}">Register</a> </div>
            </div>
             
            @endif
           <!-- Check user is logged in --> 
          </div>
        </div>
      </div>
    </div>
  </div>
    
</body>
</html>
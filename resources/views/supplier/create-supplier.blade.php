<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Create a Supplier</title>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
  <script type="text/javascript" src="../index.js"></script>
  <script type="text/javascript" src="../wizard.js"></script>
  <link rel="stylesheet" href="../wizard.css">

  <script>
    function DataCopyFunction() {
    document.getElementById("add_1_2").value = document.getElementById("add_1_1").value,
    document.getElementById("add_2_2").value = document.getElementById("add_2_1").value,
    document.getElementById("add_3_2").value = document.getElementById("add_3_1").value,
    document.getElementById("add_4_2").value = document.getElementById("add_4_1").value,
    document.getElementById("add_5_2").value = document.getElementById("add_5_1").value,
    document.getElementById("add_6_2").value = document.getElementById("add_6_1").value,
    document.getElementById("add_7_2").value = document.getElementById("add_7_1").value;
    }
    </script>

</head>

<body class="antialiased">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{url('index')}}">Create New Supplier</a>
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

  <div class="container">
  
    <!-- main app container -->
    <div class="readersack">
      <div class="container">
        <div class="row">

        <div class="container mt-5">
        <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-12">

        @foreach($errors->all() as $error)
          <div class="alert alert-danger" role="alert">
            {{$error}}
          </div>
        @endforeach

            <form id="regForm" action="{{url('/supplier/make-a-supplier')}}" method="POST" enctype="multipart/form-data">
            @csrf

                <!--Tab 01 start-->
                <!--supplier detail start-->
                <div class="tab">
                    <h4>Create Supplier:</h4><br/>
                    <button type="button" class="btn btn-primary">Supplier Details</button>
                    <button type="button" class="btn btn-light">Tax & Bank Details</button>
                    <h4>Supplier Details</h4>
                    <hr>

                    <div class="row">
                        <div class="col">
                            <h6>Supplier Code:*</h6>
                            <?php
                            $random = substr(md5(mt_rand()), 0, 8);
                            echo "<input type='text' class='form-control' value='$random' name='supp_code' readonly>"
                            ?>
                        </div>

                        <div class="col">
                            <h6>Reference Number:</h6>
                            <input type="text" class="form-control" name="ref_number">
                        </div>

                        <div class="col">
                            <h6>Supplier Type:*</h6>
                            <select class="form-control" name="sup_type">
                                <option selected>Select</option>
                                @foreach($supp_type as $data)
                                <option value="{{$data->name}}">{{$data->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-4">
                            <h6>Supplier Name:*</h6>
                            <input type="text" class="form-control" name="supp_name">
                        </div>

                        <div class="col-md-4">
                            <h6>Cheque Writer's Name:</h6>
                            <input type="text" class="form-control" name="cheque_name">
                        </div>

                        <div class="col-md-4"></div>
                    </div>
                    <br>
                    <!--supplier detail end-->

                    <!--contact detail start-->
                    <h4>Contact Details</h4>
                    <hr>
                    <div class="row">
                        <!--Mobile Number text field start-->
                        <div class="col-sm-4">
                            <h6>Mobile Number:*</h6>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <select class="form-control" name="mob_number_1">
                                        <option selected>+94</option>
                                        @foreach($countrycode as $data)
                                        <option value="{{$data->phonecode}}">{{$data->phonecode}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="mob_number_2">
                                </div>
                            </div>
                            <br>
                        <!--Mobile Number text field end-->

                        <!--FAX text field start-->
                            <h6>FAX:*</h6>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <select class="form-control" name="fax_1">
                                        <option selected>+94</option>
                                        @foreach($countrycode as $data)
                                        <option value="{{$data->phonecode}}">{{$data->phonecode}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="fax_2">
                                </div>
                            </div>
                            <br>
                        </div>
                        <!--FAX text field end-->

                        <!--Land Line Number start-->
                        <div class="col-sm-4">
                            <h6>Land Line Number:*</h6>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <select class="form-control" name="land_number_1">
                                        <option selected>+94</option>
                                        @foreach($countrycode as $data)
                                        <option value="{{$data->phonecode}}">{{$data->phonecode}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="land_number_2">
                                </div>
                            </div>
                            <br>
                        </div>
                        <!--Landline Number end-->

                        <div class="col-sm-4">
                            <h6>Email:*</h6>
                            <div class="col">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="email">
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>

                    </div>
                    <!--contact details area end-->

                    <!--billing address area start-->
                    <hr>
                    <div class="row">
                    <div class="col-sm-5">
                    <h6>Billing Address:*</h6>
                    <div class="col">

                        <div class="form-group row">
                            <label class="col-md-5 col-form-label" style="font-size:16px;">Address Line 01:*</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" id="add_1_1" name="ad_line_1">
                            </div>
                        </div><br>

                        <div class="form-group row">
                            <label class="col-md-5 col-form-label" style="font-size:16px;">Address Line 02:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" id="add_2_1" name="ad_line_2">
                            </div>
                        </div><br>

                        <div class="form-group row">
                            <label class="col-md-5 col-form-label" style="font-size:16px;">Address Line 03:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" id="add_3_1" name="ad_line_3">
                            </div>
                        </div><br>

                        <div class="form-group row">
                            <label class="col-md-5 col-form-label" style="font-size:16px;">City:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" id="add_4_1" name="city">
                            </div>
                        </div><br>

                        <div class="form-group row">
                            <label class="col-md-5 col-form-label" style="font-size:16px;">ZIP/ Postal Code:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" id="add_5_1" name="zip_post_code">
                            </div>
                        </div><br>
                        
                        <div class="form-group row">
                            <label class="col-md-5 col-form-label" style="font-size:16px;">Country:</label>
                            <div class="col-md-7">
                                <select class="form-control" id="add_6_1" name="country">
                                    <option selected>Sri Lanka</option>
                                    @foreach($countrycode as $data)
                                    <option value="{{$data->nicename}}">{{$data->nicename}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><br>

                        <div class="form-group row">
                            <label class="col-md-5 col-form-label" style="font-size:16px;">State/ Province:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" id="add_7_1" name="state_province">
                                <input type="hidden" name="billing" value="1">
                            </div>
                        </div>

                        </div>
                    </div>

                    <div class="col-sm-2 text-center"><br><br><br><br><br><br><br>
                        <button type="button" onclick="DataCopyFunction()" class="btn btn-primary">Copy -></button>
                    </div>

                    <div class="col-sm-5">
                    <h6>Shipping Adreess:*</h6>
                    <div class="col">

                        <div class="form-group row">
                        <label class="col-md-5 col-form-label" style="font-size:16px;">Address Line 01:*</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" id="add_1_2" name="s_ad_line_1">
                            </div>
                        </div><br>

                        <div class="form-group row">
                            <label class="col-md-5 col-form-label" style="font-size:16px;">Address Line 02:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" id="add_2_2" name="s_ad_line_2">
                            </div>
                        </div><br>

                        <div class="form-group row">
                            <label class="col-md-5 col-form-label" style="font-size:16px;">Address Line 03:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" id="add_3_2" name="s_ad_line_3">
                            </div>
                        </div><br>

                        <div class="form-group row">
                            <label class="col-md-5 col-form-label" style="font-size:16px;">City:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" id="add_4_2" name="s_city">
                            </div>
                        </div><br>

                        <div class="form-group row">
                            <label class="col-md-5 col-form-label" style="font-size:16px;">ZIP/ Postal Code:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" id="add_5_2" name="s_zip_post_code">
                            </div>
                        </div><br>
                        
                        <div class="form-group row">
                            <label class="col-md-5 col-form-label" style="font-size:16px;">Country:</label>
                            <div class="col-md-7">
                            <input type="text" class="form-control" id="add_6_2" name="s_country">
                            </div>
                        </div><br>

                        <div class="form-group row">
                            <label class="col-md-5 col-form-label" style="font-size:16px;">State/ Province:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" id="add_7_2" name="s_state_province">
                                <input type="hidden" name="s_shipping" value="2">
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                </div><br>
                
                <!--billing address end-->
                <!--Tab 01 end-->

                <!--Tab 02 start-->
                <!--tax and bank details tab start-->
                <div class="tab">
                <h4>Create Supplier:</h4><br/>
                <button type="button" class="btn btn-light">Supplier Details</button>
                <button type="button" class="btn btn-primary">Tax & Bank Details</button>

                <h4>Credit Details</h4>
                <hr/>
                    <div class="row">
                        <div class="col">
                            <h6>Credit Limit:</h6>
                            <input type="text" class="form-control" name="credit_limit">
                        </div>

                        <div class="col">
                            <h6>Credit Period(Days):</h6>
                            <input type="text" class="form-control" name="credit_period">
                        </div>

                        <div class="col">
                            <h6>Privilages Discount(%):</h6>
                            <input type="text" class="form-control" name="privi_discount">
                        </div>
                    </div>
                    <br>
                    
                    <h4>Payment Details</h4>
                    <hr/>

                    <div class="row">
                        <div class="col-md-4">
                            <h6>Bank Name:</h6>
                            <select class="form-control" id="bank_name" name="bank_name">
                            @foreach($bank_name as $data)
                            <option value="{{$data->name}}">{{$data->name}}</option>
                            @endforeach
                        </select>
                        </div>

                        <div class="col-md-4">
                            <h6>Branch:</h6>
                            <select class="form-control" id="branch_name" name="branch_name">
                            @foreach($branch_name as $data)
                            <option value="{{$data->name}}">{{$data->name}}</option>
                            @endforeach
                        </select>
                        </div>

                        <div class="col-md-4">
                            <h6>Account Holder's Name:</h6>
                            <input type="text" class="form-control" id="acc_holder_name" name="acc_holder_name">
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-4">
                            <h6>Account Number:*</h6>
                            <input type="text" class="form-control" id="acc_number" name="acc_number">
                        </div>

                        <div class="col-md-4"></div>

                        <div class="col-md-4">
                        <button type="submit" class="btn btn-light" style="float:right"><img src="/icons/plus.png" style="width:40px; height:40px;" id="tmp_save"></button>
                        </div>
                    </div>
                    
                    <br>

                    <!--table start-->
                    <table class="table data-table">
                    <thead>
                        <tr>
                        <th scope="col">Bank Name</th>
                        <th scope="col">Branch</th>
                        <th scope="col">Account Holder</th>
                        <th scope="col">Account Number</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                    </tbody>
                    </table>
                    <!--table end-->

                </div>

                <script type="text/javascript">  
                    $("form").submit(function(e){  
                        e.preventDefault();  

                        var bank_name=$('#bank_name').val();
                        var branch_name=$('#branch_name').val();
                        var acc_holder_name=$('#acc_holder_name').val();
                        var acc_number=$('#acc_number').val();
                    
                        $(".data-table tbody").append("<tr data-bank-name='"+bank_name+"' data-branch-name='"+branch_name+"' data-acc-holder-name='"+acc_holder_name+"' data-acc-number='"+acc_number+"'><td>"+bank_name+"</td><td>"+branch_name+"</td><td>"+acc_holder_name+"</td><td>"+acc_number+"</td><td><button class='btn btn-info btn-xs btn-edit'>Edit</button><button class='btn btn-danger btn-xs btn-delete'>Delete</button></td></tr>");  

                        $('#bank_name').val('');
                        $('#branch_name').val('');
                        $('#acc_holder_name').val('');
                        $('#acc_number').val('');
                    });
                    
                    $("body").on("click", ".btn-delete", function(){
                        $(this).parents("tr").remove();
                    });
                    
                    $("body").on("click", ".btn-edit", function(){
                        var bank_name = $(this).parents("tr").attr('data-bank-name');
                        var branch_name = $(this).parents("tr").attr('data-branch-name');
                        var acc_holder_name = $(this).parents("tr").attr('data-acc-holder-name');
                        var acc_number = $(this).parents("tr").attr('data-acc-number');
                    
                        $(this).parents("tr").find("td:eq(0)").html('<input name="edit_bank_name" value="'+bank_name+'">');  
                        $(this).parents("tr").find("td:eq(1)").html('<input name="edit_branch_name" value="'+branch_name+'">');
                        $(this).parents("tr").find("td:eq(2)").html('<input name="edit_acc_holder_name" value="'+acc_holder_name+'">'); 
                        $(this).parents("tr").find("td:eq(3)").html('<input name="edit_acc_number" value="'+acc_number+'">');   
                    
                        $(this).parents("tr").find("td:eq(4)").prepend("<button class='btn btn-info btn-xs btn-update'>Update</button><button class='btn btn-warning btn-xs btn-cancel'>Cancel</button>")  
                        $(this).hide();  
                    });  
                    
                    $("body").on("click", ".btn-cancel", function(){  
                        var bank_name = $(this).parents("tr").attr('data-bank-name');  
                        var branch_name = $(this).parents("tr").attr('data-branch-name');
                        var acc_holder_name = $(this).parents("tr").attr('data-acc-holder-name'); 
                        var acc_number = $(this).parents("tr").attr('data-acc-number');  
                    
                        $(this).parents("tr").find("td:eq(0)").text(bank_name); 
                        $(this).parents("tr").find("td:eq(1)").text(branch_name);
                        $(this).parents("tr").find("td:eq(2)").text(acc_holder_name); 
                        $(this).parents("tr").find("td:eq(3)").text(acc_number); 
                    
                        $(this).parents("tr").find(".btn-edit").show();  
                        $(this).parents("tr").find(".btn-update").remove();  
                        $(this).parents("tr").find(".btn-cancel").remove();  
                    });  
                    
                    $("body").on("click", ".btn-update", function(){  
                        var bank_name = $(this).parents("tr").find("input[name='edit_bank_name']").val();  
                        var branch_name = $(this).parents("tr").find("input[name='edit_branch_name']").val();
                        var acc_holder_name = $(this).parents("tr").find("input[name='edit_acc_holder_name']").val();
                        var acc_number = $(this).parents("tr").find("input[name='edit_acc_number']").val();
                    
                        $(this).parents("tr").find("td:eq(0)").text(bank_name);
                        $(this).parents("tr").find("td:eq(1)").text(branch_name);
                        $(this).parents("tr").find("td:eq(2)").text(acc_holder_name);
                        $(this).parents("tr").find("td:eq(3)").text(acc_number);
                    
                        $(this).parents("tr").attr('data-bank-name', bank_name);
                        $(this).parents("tr").attr('data-branch-name', branch_name);
                        $(this).parents("tr").attr('data-acc-holder-name', acc_holder_name);
                        $(this).parents("tr").attr('data-acc-number', acc_number);
                    
                        $(this).parents("tr").find(".btn-edit").show();  
                        $(this).parents("tr").find(".btn-cancel").remove();  
                        $(this).parents("tr").find(".btn-update").remove();  
                    });  
                    
                </script>

                <!--supplier detail end-->
                <!--Tab 02 end-->

                <div style="overflow:auto;" id="nextprevious">
                    <div style="float:right;">
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                        <button type="reset">Clear</button>
                        <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
</div>


          </div>
        </div>
      </div>
    </div>
  </div>
    
</body>
</html>
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Supplier_type;
use App\Models\Country;
use App\Models\Bank;
use App\Models\Branch;
use App\Models\Supplier;
use App\Models\Supplier_address;
use App\Models\Supplier_bank_detail;
use App\Models\Supplier_payment_detail;

class LogAuthController extends Controller
{
    function loginView()
    {
        return view("login");
    }

    function registerView()
    {
        return view("register");
    }

    function supplierView()
    {
        return view("supplier/create-supplier")
        ->with('supp_type', Supplier_type::all())
        ->with('countrycode', Country::all())
        ->with('bank_name', Bank::all())
        ->with('branch_name', Branch::all())
        ->with('supplier_info', Supplier::all());
    }
    
    function makeSupplier(Request $request)
    {
        $this->validate($request,[
            'supp_name'=>'required|string|max:255|regex:/(^([a-z A-Z]+)(\d+)?$)/u',
            'cheque_name'=>'string|max:255|regex:/(^([a-z A-Z]+)(\d+)?$)/u',
            'mob_number_2'=>'required|max:10|min:9',
            'fax_2'=>'required|max:12|min:9',
            'land_number_2'=>'required|max:10|min:9',
            'email'=>'required|email',
            ]);

            //Supplier details, Contact details save
            $supplierInformation = new Supplier;
            $supplierInformation->supplier_code = $request->supp_code;
            $supplierInformation->reference_number = $request->ref_number;
            $supplierInformation->suppliers_type = $request->sup_type;
            $supplierInformation->supplier_name = $request->supp_name;
            $supplierInformation->cheque_writers_name = $request->cheque_name;
            $supplierInformation->mobile_number = $request->input('mob_number_1').'-'.$request->input('mob_number_2');
            $supplierInformation->land_line_number = $request->input('land_number_1').'-'.$request->input('land_number_2');
            $supplierInformation->fax = $request->input('fax_1').'-'.$request->input('fax_2');
            $supplierInformation->email=$request->email;
            $supplierInformation->save();
            //dd($supplierInformation);

            //Billing Address Data save
            $supplier_Bill_Address_Information = new Supplier_address;
            $supplier_Bill_Address_Information->address_line_01 = $request->ad_line_1;
            $supplier_Bill_Address_Information->address_line_02 = $request->ad_line_2;
            $supplier_Bill_Address_Information->address_line_03 = $request->ad_line_3;
            $supplier_Bill_Address_Information->city = $request->city;
            $supplier_Bill_Address_Information->zip_postal_code = $request->zip_post_code;
            $supplier_Bill_Address_Information->country = $request->country;
            $supplier_Bill_Address_Information->state = $request->state_province;
            $supplier_Bill_Address_Information->billing_or_shipping = $request->billing;
            $supplier_Bill_Address_Information->suppliers_id = $supplierInformation->id;
            $supplier_Bill_Address_Information->save();

            //Shipping Address Data save
            $supplier_Ship_Address_Information = new Supplier_address;
            $supplier_Ship_Address_Information->address_line_01 = $request->s_ad_line_1;
            $supplier_Ship_Address_Information->address_line_02 = $request->s_ad_line_2;
            $supplier_Ship_Address_Information->address_line_03 = $request->s_ad_line_3;
            $supplier_Ship_Address_Information->city = $request->s_city;
            $supplier_Ship_Address_Information->zip_postal_code = $request->s_zip_post_code;
            $supplier_Ship_Address_Information->country = $request->s_country;
            $supplier_Ship_Address_Information->state = $request->s_state_province;
            $supplier_Ship_Address_Information->billing_or_shipping = $request->s_shipping;
            $supplier_Ship_Address_Information->suppliers_id = $supplierInformation->id;
            $supplier_Ship_Address_Information->save();

            //supplier credit details save
            $supplier_Credit_Information = new Supplier_bank_detail;
            $supplier_Credit_Information->credit_limit = $request->credit_limit;
            $supplier_Credit_Information->credit_period = $request->credit_period;
            $supplier_Credit_Information->privileges_discount = $request->privi_discount;
            $supplier_Credit_Information->suppliers_id = $supplierInformation->id;
            $supplier_Credit_Information->save();

            //payment details save
            $supplier_Payment_Information = new Supplier_payment_detail;
            $supplier_Payment_Information->bank_name = $request->bank_name;
            $supplier_Payment_Information->branch_name = $request->branch_name;
            $supplier_Payment_Information->account_holder_name = $request->acc_holder_name;
            $supplier_Payment_Information->account_number = $request->acc_number;
            $supplier_Payment_Information->suppliers_id = $supplierInformation->id;
            $supplier_Payment_Information->save();
            
            //return redirect()->action([LogAuthController::class,"index"]);
            return redirect("index")->with('message','Supplier create successful.');
    }

    function editSupplier($id){
        return view("supplier/edit-supplier")
        ->with('supp_type', Supplier_type::all())
        ->with('countrycode', Country::all())
        ->with('bank_name', Bank::all())
        ->with('branch_name', Branch::all())
        ->with('supplier_info', Supplier::where('id',$id)->get())
        ->with('supplier_billing_address_info', Supplier_address::where([['suppliers_id', $id],['billing_or_shipping', '=', '1']])->get())
        ->with('supplier_shipping_address_info', Supplier_address::where([['suppliers_id', $id],['billing_or_shipping', '=', '2']])->get())
        ->with('supplier_bank_info', Supplier_bank_detail::where('suppliers_id',$id)->get())
        ->with('supplier_payment_info', Supplier_payment_detail::where('suppliers_id',$id)->get());
        }

    function updateSupplier(Request $request, $id){
            $updateSupplierInformation = Supplier::find($id);
            $updateSupplierInformation->supplier_code = $request->supp_code;
            $updateSupplierInformation->reference_number = $request->input('ref_number');
            $updateSupplierInformation->suppliers_type = $request->input('sup_type');
            $updateSupplierInformation->supplier_name = $request->input('supp_name');
            $updateSupplierInformation->cheque_writers_name = $request->input('cheque_name');
            $updateSupplierInformation->mobile_number = $request->input('mob_number_1').'-'.$request->input('mob_number_2');
            $updateSupplierInformation->land_line_number = $request->input('land_number_1').'-'.$request->input('land_number_2');
            $updateSupplierInformation->fax = $request->input('fax_1').'-'.$request->input('fax_2');
            $updateSupplierInformation->email=$request->input('email');
            $updateSupplierInformation->save();

            //Billing Address Data save
            $update_Supplier_Bill_Address_Information = Supplier_address::find($id);
            switch($update_Supplier_Bill_Address_Information->billing_or_shipping == 1){
            case
            $update_Supplier_Bill_Address_Information->address_line_01 = $request->ad_line_1;
            $update_Supplier_Bill_Address_Information->address_line_02 = $request->ad_line_2;
            $update_Supplier_Bill_Address_Information->address_line_03 = $request->ad_line_3;
            $update_Supplier_Bill_Address_Information->city = $request->city;
            $update_Supplier_Bill_Address_Information->zip_postal_code = $request->zip_post_code;
            $update_Supplier_Bill_Address_Information->country = $request->country;
            $update_Supplier_Bill_Address_Information->state = $request->state_province;
            $update_Supplier_Bill_Address_Information->billing_or_shipping = $request->billing;
            $update_Supplier_Bill_Address_Information->save();
            break;
            }
            
            //Shipping Address Data save
            $update_Supplier_Ship_Address_Information = Supplier_address::find($id);
            switch($update_Supplier_Ship_Address_Information->billing_or_shipping == 2){
            case
            $update_Supplier_Ship_Address_Information->address_line_01 = $request->s_ad_line_1;
            $update_Supplier_Ship_Address_Information->address_line_02 = $request->s_ad_line_2;
            $update_Supplier_Ship_Address_Information->address_line_03 = $request->s_ad_line_3;
            $update_Supplier_Ship_Address_Information->city = $request->s_city;
            $update_Supplier_Ship_Address_Information->zip_postal_code = $request->s_zip_post_code;
            $update_Supplier_Ship_Address_Information->country = $request->s_country;
            $update_Supplier_Ship_Address_Information->state = $request->s_state_province;
            $update_Supplier_Ship_Address_Information->billing_or_shipping = $request->s_shipping;
            $update_Supplier_Ship_Address_Information->save();
            break;
            }

            //supplier credit details save
            $supplier_Credit_Information = Supplier_bank_detail::find($id);
            $supplier_Credit_Information->credit_limit = $request->credit_limit;
            $supplier_Credit_Information->credit_period = $request->credit_period;
            $supplier_Credit_Information->privileges_discount = $request->privi_discount;
            $supplier_Credit_Information->save();

            //payment details save
            $supplier_Payment_Information = Supplier_payment_detail::find($id);
            $supplier_Payment_Information->bank_name = $request->bank_name;
            $supplier_Payment_Information->branch_name = $request->branch_name;
            $supplier_Payment_Information->account_holder_name = $request->acc_holder_name;
            $supplier_Payment_Information->account_number = $request->acc_number;
            $supplier_Payment_Information->save();
            
            //return redirect()->action([LogAuthController::class,"/index"]);
            //return redirect("./index");
            return view("index");
    }

    function doLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',   // required and email format validation
            'password' => 'required', // required and number field validation

        ]);
        if ($validator->fails())
        {
            return back()->withInput()->withErrors($validator);
            // validation failed redirect back to form
        } else {
            //validations are passed try login using laravel auth attemp
            if (\Auth::attempt($request->only(["email", "password"]))) {
                return redirect("index")->with('success', 'Login Successful');
            } else {
                return back()->withErrors( "Invalid credentials");
            }
        }
    }

    function doRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',

        ]);
        if ($validator->fails())
        {
            return back()->withInput()->withErrors($validator);
        } else {
            $User = new User;
            $User->name = $request->name;
            $User->email = $request->email;
            $User->password = bcrypt($request->password);
            $User->save();
            return redirect("login")->with('success', 'You have successfully registered, Login to access your dashboard');
        }
    }

    function index()
    {
        return view("index")
        ->with('supplier_info', Supplier::all());
    }

    function deleteSupplier($id)
    {
        $supplier_id = Supplier::find($id)->delete();
        $supplier_id = Supplier_address::find($id)->delete();
        $supplier_id = Supplier_bank_detail::find($id)->delete();
        $supplier_id = Supplier_payment_detail::find($id)->delete();
        return route("supplier.index");
    }

    function logout()
    {
        \Auth::logout();
        return redirect("/")->with('success', 'Logout successfully');
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function allCustomers(){
        //all customers
    }
    public function oneCustomer($id){
        //consultar por un customer
    }
    public function createCustomer(Request $request){
        //consultar por un customer
    }
    public function modifyCustomer(Request $request){
        //modificar customer
    }
    public function deleteCustomer(Request $request){
        //delete customer
    }
}

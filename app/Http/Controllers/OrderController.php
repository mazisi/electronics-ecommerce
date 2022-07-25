<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
        public function index()
        {
            return view('admin.orders.order');
        }

        public function pendingOrders(){
           return view('admin.orders.pending-orders');
        }

        public function viewOrder()
        {
            return view('admin.orders.view-order');
        }

        public function paidOrders()
        {
            return view('admin.orders.paid-orders');
        }

        public function declinedOrders()
        {
            return view('admin.orders.declined-order');
        }
}

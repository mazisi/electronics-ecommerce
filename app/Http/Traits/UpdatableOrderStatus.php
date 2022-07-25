<?php
namespace App\Http\Traits;

use App\Models\User;

trait UpdatableOrderStatus{  

  public static function updateStatus($status, $order_id){

    try {
      $user = User::find($order_id);
      if($status == 'Complete') {
        $user->update(['status' => 3]);
      }elseif ($status == 'Declined') {
        $user->update(['status' => 4]);
      }
    } catch (\Throwable $th) {
      return view('admin._500_');
    }
       
  }

}
<?php
namespace App\Http\Traits;
use Illuminate\Support\Str;

trait HasCookie{
  

  public static function setCartCookie(){
            $cookie_name = "user";
            $cookie_value = sha1(Str::random(20));
                        
            if(!isset($_COOKIE[$cookie_name])) {
              setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
            }
            
  }

}
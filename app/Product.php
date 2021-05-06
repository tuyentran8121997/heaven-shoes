<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Session;
use DB;

class Product extends Model
{
    public function attributes(){
        return $this->hasMany('App\ProductsAttribute','product_id');
    }

    public static function cartCount(){
        if(Auth::check()){
            //user is logged in; use Auth
            $user_email = Auth::user()->email;
            $cartCount = DB::table('cart')->where('user_email',$user_email)->sum('quantity');
        }else{
            //user is not logged in; use Session
            $session_id = Session::get('session_id');
            $cartCount = DB::table('cart')->where('session_id',$session_id)->sum('quantity');
        }
        return $cartCount;
    }
}

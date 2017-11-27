<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Product extends Model
{
    //

		use SoftDeletes;
   protected  $fillable = [
       'id', 'user_id', 'product_name', 'product_description', 'product_price', 'product_file', 'product_image', 'product_section', 'product_status', 'created_at', 'updated_at', 'deleted_at'
    ];


    public function useres()
{
    return $this->belongsTo('App\User','user_id','id');
}

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_comment extends Model
{
    use HasFactory;
    protected $table = 'tbl_comments';
  
    protected $fillable = [
        'customer_id',
        'product_id',
        'comment',
        
    ];

      public function customer(){
        return $this->hasOne(tbl_customers::class,'id','customer_id');
    }
     public function product(){
        return $this->hasOne(tbl_product::class,'id','product_id');
    }
}
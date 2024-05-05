<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class order extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'orders';
    protected $primaryKey = 'id_order';
    public $timestamps = true;
    protected $date =[
      'created_at',
      'updated_at'  
    ];
    protected $fillable = [
        'id_order',
        'name',
        'phone',
        'email',
        'total_amount',
        'city',  
        'district',
        'ward',
        'address',  
        'paymentMethod',  
        'token',
        'id_customer',
        'note'
    ];

     public function customer(){
        return $this->hasOne(tbl_customers::class,'id','customer_id');
    }
    public function details(){
      return $this->hasMany(order_detail::class, 'id_order', 'id_order');
    }
}
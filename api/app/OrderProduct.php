<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class,'id');
    }

    public function user() {
        return $this->hasMany(OrderUser::class, 'id', 'order_user_id');
//        return $this->belongsTo(OrderUser::class, 'user_id', 'id');
    }

}

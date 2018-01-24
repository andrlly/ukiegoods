<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderUser extends Model
{
    public function orderProduct() {

        return $this->belongsTo(OrderProduct::class, 'id', 'order_user_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{


 	public function product(){
    return $this->belongsTo(Product::class, 'product_id', 'id');
    }

     public function category(){
    return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}

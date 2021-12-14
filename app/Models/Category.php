<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'category_id';
    protected $table='categories';
     /**
      * The attributes that are mass assignable.
      * @var string[]
      */
      protected $fillable = [
        'category_name'
    ];


    public function Product()
    {
        return $this->hasMany(Product::class);
    }
}

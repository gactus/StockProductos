<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

     /**
      * The attributes that are mass assignable.
      * @var string[]
      */
    protected $fillable = [
        'branch_name',
        'branch_address',
        'branch_phone',
        'branch_status',
    ];

    /**
     * Obtiene todos los productos asociados a un branch
     */
    public function Product()
    {
        return $this->belongsToMany(Product::class);
    }
}

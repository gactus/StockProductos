<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $primaryKey = 'product_id';

       /**
      * The attributes that are mass assignable.
      * @var string[]
      */
       use HasFactory;
       use SoftDeletes;

      protected $fillable = [
       'product_status',
        'product_name',
        'product_code',
        'product_stock',
        'product_price',
        'category_id',
        'description',
        'branch_id'
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class,'category_id','category_id');
    }

    public static function search($input, $deleted = false)
    {
        $product=new self();
        if(isset($input['product_code']) && $input['product_code'] != '')
        {
            $product=$product->where('product_code',$input['product_code']);
        }
        if(isset($input['product_name']) && $input['product_name'] != '')
        {
            $product=$product->where('product_name',$input['product_name']);
        }
        if(isset($input['branch_id']) && $input['branch_id'] != '')
        {
            $product=$product->where('branch_id',$input['branch_id']);
        }
        if($deleted){
            $product = $product->onlyTrashed();
        }
        return $product->get();
    }
    public static function destroyByFilters($input, $deleteType)
    {
        $product=new self();
        if(isset($input['product_code']))
        {
            $product=$product->where('product_code',$input['product_code']);
        }
        if(isset($input['branch_id']))
        {
            $product=$product->where('branch_id',$input['branch_id']);
        }

        if ($deleteType == 0){
            if(count($input) > 0)
            {
                return $product->delete();
            }
            return $product->query()->forceDelete();
        }

        if ($deleteType == 1)
        {
            if(count($input) > 0)
            {
                return $product->forceDelete();
            }
            return $product->query()->forceDelete();
        }

    }
    public static function modifyByFilters($input){
        $product=new self();
        if(isset($input['product_code']) && $input['product_code'] != '')
        {
            $product=$product->where('product_code',$input['product_code']);
            return $product->update($input);
        }
        return false;
    }
}

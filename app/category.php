<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $guarded=[];
    public function subCategories(){
        return $this->hasMany('App\subcategory','cate_id', 'id');
    }
}

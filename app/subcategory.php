<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subcategory extends Model
{
    public function categories(){
        return $this->belongsTo('App\category', 'cate_id', 'id');
    }
}

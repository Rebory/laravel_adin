<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dynamic extends Model
{
    //protected $table = 'tbl_headerfooter';
    protected $fillable = [
        'header','footer','contactus','abouts' 
    ];
}

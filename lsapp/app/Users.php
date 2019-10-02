<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    
        protected $table='posts';
        public $primaryKey='id';
        public $timestamps=true;
    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table='articales';
    protected $fillable=["title","content","cat_id"];
}

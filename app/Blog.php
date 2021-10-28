<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
  protected $table='articales';
  protected $fillable=["title","content","cat_id"];






}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $table ="tasks";
    protected $fillable = ["title",	"description","start_date","end_date","image","user_id"];
}

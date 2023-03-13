<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class create_catagory_table extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="category";
    protected $primaryKey="cid";
}

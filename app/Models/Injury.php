<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Injury extends Model
{
    use HasFactory;
    protected $fillable = ['injury_Name'];
    public $timestamps =false;
    public $primaryKey = 'id';
    public $table = 'injuries';
}

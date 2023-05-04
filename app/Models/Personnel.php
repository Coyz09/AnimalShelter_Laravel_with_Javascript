<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use HasFactory;
    public $table = 'personnels';
   	// public $fillable = ['id','personnel_Fname','personnel_Lname','personnel_Job','personnel_Contact','user_id','img'];
   	public $timestamps =false;
   	public $primaryKey = 'id';
    protected $guarded = ['id'];

	public function animals(){
        return $this->belongsToMany('App\Models\Animal','animal_personnel','personnel_id','animal_id');
    }

    public function users(){
        return $this->hasMany('App\Models\User','id');
    }



}

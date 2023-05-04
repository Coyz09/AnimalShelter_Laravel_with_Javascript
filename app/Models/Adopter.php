<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adopter extends Model
{
   use HasFactory;
   public $table = 'adopters';
   // protected $fillable = ['adopter_Fname','adopter_Lname','adopter_Address','adopter_Contact','adopter_Email','animal_id'];
   public $timestamps =false;
   public $primaryKey = 'id';
   protected $guarded = ['id'];
   

   public function animals(){
        return $this->belongsToMany('App\Models\Animal','adopter_animal','adopter_id','animal_id');
    }


}

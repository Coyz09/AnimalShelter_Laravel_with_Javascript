<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rescuer extends Model
{
    use HasFactory;
    public $table = 'rescuers';
   public $timestamps =false;
   public $primaryKey = 'id';
    // protected $fillable = ['rescuer_Fname','rescuer_Lname','rescuer_Age','rescuer_Address','rescuer_Contact','rescuer_Email','img'];
   protected $guarded = ['id'];
      public function animals(){
        return $this->belongsToMany('App\Models\Animal','animal_rescuer','rescuer_id','animal_id');
    }
}

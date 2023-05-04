<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Animal extends Model 
{
    use HasFactory;
    public $table = 'animals';

    public $timestamps =false;
    public $primaryKey = 'id';

    // protected $fillable = ['animal_Name','animal_Type','animal_Breed','animal_Age','animal_Rescueplace','animal_Rescuedate','animal_Image','adopter_Status','injury_ID'];

     protected $guarded = ['id'];

     public function injuries(){
        return $this->belongsToMany('App\Models\Injury','animal_injury','animal_id','injury_id');
    }

     public $searchableType = 'Animal';
    public function getSearchResult(): SearchResult
     {
        $url = route('homepage.animalshow', $this->id);
     
         return new \Spatie\Searchable\SearchResult(
            $this,
            $this->animal_Name,
            $url
            );
     }
  
}

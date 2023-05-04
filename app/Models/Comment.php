<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
	public $primaryKey = 'id';
    public $timestamps = true;
	protected $fillable = ['name', 'email', 'comment','animal_id'];

	public function animals(){
        return $this->hasMany('App\Models\Animal', 'id' );
		}
}

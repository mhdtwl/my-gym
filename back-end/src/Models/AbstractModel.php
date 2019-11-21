<?php
/// use this class and extend it for any model has 2 lang name as input
namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class AbstractModel extends Model
{
    protected $fillable = [
      'name','description' 
  	];	
  	
	public function getToCarbonDate($date)
	{
	    $dt = Carbon::parse($date);
    	return $dt->diffForHumans(Carbon::now());
	} 
}

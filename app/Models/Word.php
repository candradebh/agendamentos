<?php



namespace Oncoclinicas\Models;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Word extends Model implements Transformable{

   use TransformableTrait;

   protected $table = 'words';
   protected $fillable = ['word','wordtype','definition'];

}




 
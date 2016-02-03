<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Pirate extends Model{
	protected $table = 'PIRATE'; //nom de la table
	protected $primaryKey = 'IDPIRATE';

	public $timestamps = false;
}
?>
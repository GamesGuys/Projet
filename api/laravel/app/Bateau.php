<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Bateau extends Model{
	protected $table = 'BATEAU'; //nom de la table
	protected $primaryKey = 'IDBATEAU';
	protected $fillable = array('NOMBATEAU', 'VIEACT', 'GOLDACT', 'RHUMACT', 'NIVCALLES', 'NIVCANONS', 'NIVPONT', 'NIVMAT', 'NIVBARRE', 'NIVCOQUE');

	public $timestamps = false;
}
?>
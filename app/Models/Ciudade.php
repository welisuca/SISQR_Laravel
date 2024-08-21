<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ciudade
 * 
 * @property int $Cod_ciud
 * @property string|null $Nom_ciud
 * 
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Ciudade extends Model
{
	protected $table = 'ciudades';
	protected $primaryKey = 'Cod_ciud';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Cod_ciud' => 'int'
	];

	protected $fillable = [
		'Nom_ciud'
	];

	public function users()
	{
		return $this->hasMany(User::class, 'Ciudad');
	}
}

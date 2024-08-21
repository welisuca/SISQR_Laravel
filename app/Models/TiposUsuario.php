<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TiposUsuario
 * 
 * @property int $Codtip_usu
 * @property string|null $Tip_usu
 * 
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class TiposUsuario extends Model
{
	protected $table = 'tipos_usuarios';
	protected $primaryKey = 'Codtip_usu';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Codtip_usu' => 'int'
	];

	protected $fillable = [
		'Tip_usu'
	];

	public function users()
	{
		return $this->hasMany(User::class, 'Codtip_usu');
	}
}

<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TiposMov
 * 
 * @property int $Codtipom
 * @property string|null $Nomtipomcor
 * @property string|null $Nomtipolar
 * @property string|null $Naturaleza
 * 
 * @property Collection|Transaccione[] $transacciones
 *
 * @package App\Models
 */
class TiposMov extends Model
{
	protected $table = 'tipos_mov';
	protected $primaryKey = 'Codtipom';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Codtipom' => 'int'
	];

	protected $fillable = [
		'Nomtipomcor',
		'Nomtipolar',
		'Naturaleza'
	];

	public function transacciones()
	{
		return $this->hasMany(Transaccione::class, 'Tiposmov');
	}
}

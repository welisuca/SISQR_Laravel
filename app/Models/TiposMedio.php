<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TiposMedio
 * 
 * @property int $Codtipmed
 * @property string|null $Tipmed
 * 
 * @property Collection|Transaccione[] $transacciones
 *
 * @package App\Models
 */
class TiposMedio extends Model
{
	protected $table = 'tipos_medios';
	protected $primaryKey = 'Codtipmed';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Codtipmed' => 'int'
	];

	protected $fillable = [
		'Tipmed'
	];

	public function transacciones()
	{
		return $this->hasMany(Transaccione::class, 'Tip_med');
	}
}

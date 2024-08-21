<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cuenta
 * 
 * @property int $Codcuenta
 * @property Carbon|null $Fechacre
 * @property int $Usuario
 * @property string|null $Descrip
 * @property int $usuarios_Ndocum
 * 
 * @property User $user
 * @property Collection|Transaccione[] $transacciones
 *
 * @package App\Models
 */
class Cuenta extends Model
{
	protected $table = 'cuentas';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Codcuenta' => 'int',
		'Fechacre' => 'datetime',
		'Usuario' => 'int',
		'usuarios_Ndocum' => 'int'
	];

	protected $fillable = [
		'Fechacre',
		'Usuario',
		'Descrip'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'usuarios_Ndocum', 'Ndocum');
	}

	public function transacciones()
	{
		return $this->hasMany(Transaccione::class, 'Codcuenta');
	}
}

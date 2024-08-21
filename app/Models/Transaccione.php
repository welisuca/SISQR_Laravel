<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Transaccione
 * 
 * @property int $Codtransaccion
 * @property Carbon|null $Fecha
 * @property float|null $Valor
 * @property string|null $Descrip
 * @property int $Tip_med
 * @property int $Tiposmov
 * @property int $Codcuenta
 * 
 * @property Cuenta $cuenta
 * @property TiposMedio $tipos_medio
 * @property TiposMov $tipos_mov
 *
 * @package App\Models
 */
class Transaccione extends Model
{
	protected $table = 'transacciones';
	protected $primaryKey = 'Codtransaccion';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Codtransaccion' => 'int',
		'Fecha' => 'datetime',
		'Valor' => 'float',
		'Tip_med' => 'int',
		'Tiposmov' => 'int',
		'Codcuenta' => 'int'
	];

	protected $fillable = [
		'Fecha',
		'Valor',
		'Descrip',
		'Tip_med',
		'Tiposmov',
		'Codcuenta'
	];

	public function cuenta()
	{
		return $this->belongsTo(Cuenta::class, 'Codcuenta');
	}

	public function tipos_medio()
	{
		return $this->belongsTo(TiposMedio::class, 'Tip_med');
	}

	public function tipos_mov()
	{
		return $this->belongsTo(TiposMov::class, 'Tiposmov');
	}
}

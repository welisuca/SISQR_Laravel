<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TiposDocumento
 * 
 * @property int $Codtip_doc
 * @property string|null $Tip_doc
 * 
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class TiposDocumento extends Model
{
	protected $table = 'tipos_documentos';
	protected $primaryKey = 'Codtip_doc';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Codtip_doc' => 'int'
	];

	protected $fillable = [
		'Tip_doc'
	];

	public function users()
	{
		return $this->hasMany(User::class, 'Codtip_doc');
	}
}

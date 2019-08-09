<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 09 Jul 2019 02:03:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TblParamdetail
 * 
 * @property int $ID_PARAMDETAIL
 * @property int $ID_PARAM
 * @property string $KEY
 * @property string $VALUE
 * @property string $DATA_TYPE
 * @property int $PARENT
 * 
 * @property \App\Models\TblParam $tbl_param
 *
 * @package App\Models
 */
class TblParamdetail extends Eloquent
{
	protected $table = 'tbl_paramdetail';
	protected $primaryKey = 'ID_PARAMDETAIL';
	public $timestamps = false;

	protected $casts = [
		'ID_PARAM' => 'int',
		'PARENT' => 'int'
	];

	protected $fillable = [
		'ID_PARAM',
		'KEY',
		'VALUE',
		'DATA_TYPE',
		'PARENT'
	];

	public function tbl_param()
	{
		return $this->belongsTo(\App\Models\TblParam::class, 'ID_PARAM');
	}
}

<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 09 Jul 2019 02:03:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TblResult
 * 
 * @property int $ID_RESULT
 * @property int $ID_PARAM
 * @property string $OBJECT_REL
 * @property bool $RESULT_CONDI
 * @property string $OBJECT_RES
 * @property bool $OBJECT_VALUE
 * 
 * @property \App\Models\TblParam $tbl_param
 *
 * @package App\Models
 */
class TblResult extends Eloquent
{
	protected $table = 'tbl_result';
	protected $primaryKey = 'ID_RESULT';
	public $timestamps = false;

	protected $casts = [
		'ID_PARAM' => 'int',
		'RESULT_CONDI' => 'bool',
		'OBJECT_VALUE' => 'bool'
	];

	protected $fillable = [
		'ID_PARAM',
		'OBJECT_REL',
		'RESULT_CONDI',
		'OBJECT_RES',
		'OBJECT_VALUE'
	];

	public function tbl_param()
	{
		return $this->belongsTo(\App\Models\TblParam::class, 'ID_PARAM');
	}
}

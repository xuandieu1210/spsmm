<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 09 Jul 2019 02:03:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TblClausedetail
 * 
 * @property int $ID_CLAUSEDETAIL
 * @property int $ID_CLAUSE
 * @property string $MA_SENSOR
 * @property float $HI_VALUE
 * @property float $LOW_VALUE
 * @property int $DIR_VALUE
 * @property string $OPERATOR
 * @property int $INDEX_VALUE
 * 
 * @property \App\Models\TblClause $tbl_clause
 *
 * @package App\Models
 */
class TblClausedetail extends Eloquent
{
	protected $table = 'tbl_clausedetail';
	protected $primaryKey = 'ID_CLAUSEDETAIL';
	public $timestamps = false;

	protected $casts = [
		'ID_CLAUSE' => 'int',
		'HI_VALUE' => 'float',
		'LOW_VALUE' => 'float',
		'DIR_VALUE' => 'int',
		'INDEX_VALUE' => 'int'
	];

	protected $fillable = [
		'ID_CLAUSE',
		'MA_SENSOR',
		'HI_VALUE',
		'LOW_VALUE',
		'DIR_VALUE',
		'OPERATOR',
		'INDEX_VALUE'
	];

	public function tbl_clause()
	{
		return $this->belongsTo(\App\Models\TblClause::class, 'ID_CLAUSE');
	}
}

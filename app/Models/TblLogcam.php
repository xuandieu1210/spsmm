<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 09 Jul 2019 02:03:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TblLogcam
 * 
 * @property int $ID_LOGCAM
 * @property \Carbon\Carbon $DATE_LOG
 * @property \Carbon\Carbon $DATE_PI
 * @property string $FILE_CAM
 * @property int $ID_PI
 * 
 * @property \App\Models\TblPi $tbl_pi
 *
 * @package App\Models
 */
class TblLogcam extends Eloquent
{
	protected $table = 'tbl_logcam';
	protected $primaryKey = 'ID_LOGCAM';
	public $timestamps = false;

	protected $casts = [
		'ID_PI' => 'int'
	];

	protected $dates = [
		'DATE_LOG',
		'DATE_PI'
	];

	protected $fillable = [
		'DATE_LOG',
		'DATE_PI',
		'FILE_CAM',
		'ID_PI'
	];

	public function tbl_pi()
	{
		return $this->belongsTo(\App\Models\TblPi::class, 'ID_PI');
	}
}

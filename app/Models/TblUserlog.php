<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 09 Jul 2019 02:03:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TblUserlog
 * 
 * @property int $ID_USERLOG
 * @property \Carbon\Carbon $DATE_LOG
 * @property string $ACTION_LOG
 * @property string $USER_ACC
 *
 * @package App\Models
 */
class TblUserlog extends Eloquent
{
	protected $table = 'tbl_userlog';
	protected $primaryKey = 'ID_USERLOG';
	public $timestamps = false;

	protected $dates = [
		'DATE_LOG'
	];

	protected $fillable = [
		'DATE_LOG',
		'ACTION_LOG',
		'USER_ACC'
	];
}

<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 09 Jul 2019 02:03:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TblLogaction
 * 
 * @property string $username
 * @property string $ipaddress
 * @property \Carbon\Carbon $logtime
 * @property string $controller
 * @property string $action
 * @property string $details
 *
 * @package App\Models
 */
class TblLogaction extends Eloquent
{
	protected $table = 'tbl_logaction';
	public $incrementing = false;
	public $timestamps = false;

	protected $dates = [
		'logtime'
	];

	protected $fillable = [
		'username',
		'ipaddress',
		'logtime',
		'controller',
		'action',
		'details'
	];
}

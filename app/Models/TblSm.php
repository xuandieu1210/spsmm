<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 09 Jul 2019 02:03:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TblSm
 * 
 * @property int $SMS_ID
 * @property string $PHONE_NUM
 * @property \Carbon\Carbon $TIME_CREATE
 * @property string $SMS_CONTENT
 * @property string $TICKET
 *
 * @package App\Models
 */
class TblSm extends Eloquent
{
	protected $primaryKey = 'SMS_ID';
	public $timestamps = false;

	protected $dates = [
		'TIME_CREATE'
	];

	protected $fillable = [
		'PHONE_NUM',
		'TIME_CREATE',
		'SMS_CONTENT',
		'TICKET'
	];
}

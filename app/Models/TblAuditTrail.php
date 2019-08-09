<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 09 Jul 2019 02:03:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TblAuditTrail
 * 
 * @property int $id
 * @property string $old_value
 * @property string $new_value
 * @property string $action
 * @property string $model
 * @property string $field
 * @property \Carbon\Carbon $stamp
 * @property string $user_id
 * @property string $model_id
 *
 * @package App\Models
 */
class TblAuditTrail extends Eloquent
{
	protected $table = 'tbl_audit_trail';
	public $timestamps = false;

	protected $dates = [
		'stamp'
	];

	protected $fillable = [
		'old_value',
		'new_value',
		'action',
		'model',
		'field',
		'stamp',
		'user_id',
		'model_id'
	];
}

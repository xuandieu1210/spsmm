<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 09 Jul 2019 02:03:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TblMigration
 * 
 * @property string $version
 * @property int $apply_time
 *
 * @package App\Models
 */
class TblMigration extends Eloquent
{
	protected $table = 'tbl_migration';
	protected $primaryKey = 'version';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'apply_time' => 'int'
	];

	protected $fillable = [
		'apply_time'
	];
}

<?php

/**
 * Created by Reliese Model.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cache
 * 
 * @property string $key
 * @property string $value
 * @property int $expiration
 *
 * @package App
 */
class Cache extends Model
{
	protected $table = 'cache';
	protected $primaryKey = 'key';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'expiration' => 'int'
	];

	protected $fillable = [
		'value',
		'expiration'
	];
}

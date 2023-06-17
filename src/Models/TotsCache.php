<?php

namespace Tots\CacheDatabase\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of Model
 *
 * @author matiascamiletti
 */
class TotsCache extends Model
{
    protected $table = 'tots_cache';
    
    protected $casts = ['data' => 'array'];
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
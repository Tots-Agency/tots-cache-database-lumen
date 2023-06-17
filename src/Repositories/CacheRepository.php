<?php

namespace Tots\CacheDatabase\Repositories;

use Illuminate\Support\Facades\DB;
use Tots\CacheDatabase\Models\TotsCache;

class CacheRepository
{
    public static function saveInDays($keyName, $data, $expiresDays)
    {
        return self::save($keyName, $data, DB::raw('DATE_ADD(NOW(), INTERVAL '.$expiresDays.' DAY)'));
    }

    public static function saveInMinutes($keyName, $data, $expiresMinutes)
    {
        return self::save($keyName, $data, DB::raw('DATE_ADD(NOW(), INTERVAL '.$expiresMinutes.' MINUTE)'));
    }

    public static function save($keyName, $data, $expiresAt)
    {
        // Verify if exist cache
        $cache = TotsCache::where('key_name', $keyName)->first();
        if($cache === null){
            $cache = new TotsCache();
            $cache->key_name = $keyName;
        }

        $cache->data = $data;
        $cache->expires_at = $expiresAt;
        $cache->save();
    }
}
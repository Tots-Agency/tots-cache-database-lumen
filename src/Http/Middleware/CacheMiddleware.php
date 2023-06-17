<?php

namespace Tots\CacheDatabase\Http\Middleware;

use Closure;

class CacheMiddleware
{
    /**
     * Verifica si existe cache y la devuelve
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $keyName)
    {
        // Verify if exist cache
        $cache = \Tots\CacheDatabase\Models\TotsCache::where('key_name', $keyName)->whereRaw('expires > NOW()')->first();

        if($cache !== null){
            return $cache->data;
        }

        return $next($request);
    }
}

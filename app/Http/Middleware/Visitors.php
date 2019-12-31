<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Model\Visitor;

class Visitors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $ip = request()->getClientIp();
        if ($ip) {
            $Visitor = geoip()->getLocation($ip);
            $visit = Visitor::where('ip',$Visitor->ip)->first();
            if(!$visit){
                $visi = new Visitor;
                $visi->ip = $Visitor->ip;
                $visi->country = $Visitor->country;
                $visi->city = $Visitor->city;
                $visi->state_name = $Visitor->state_name;
                // $visi->visits = $Visitor->visits;
                $visi->save();
            } else {
                $actual_start_at = Carbon::parse($visit->updated_at);
                $actual_end_at   = Carbon::parse(Carbon::now());
                $mins            = $actual_end_at->diffInMinutes($actual_start_at, true);

                if ($mins>= 30) {
                    $visit->increment('visits');
                    $visit->save();
                }
            };
        }
        return $next($request);
    }
}

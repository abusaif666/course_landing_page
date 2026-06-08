<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Visitor;

class VisitorTracker
{
    public function handle(Request $request, Closure $next): Response
    {
        // Bot ignore
        $userAgent = strtolower($request->userAgent());

        $bots = [
            'bot',
            'google',
            'facebook',
            'crawl',
            'slurp',
            'spider'
        ];

        foreach ($bots as $bot) {
            if (str_contains($userAgent, $bot)) {
                return $next($request);
            }
        }

        // Session based unique visit per day
        if (!session()->has('visitor_tracked')) {

            Visitor::create([
                'ip_address' => $request->ip(),
                'url' => $request->fullUrl(),
                'user_agent' => $request->userAgent(),
            ]);

            session()->put('visitor_tracked', true);
        }

        return $next($request);
    }
}
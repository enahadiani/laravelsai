<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;

class HttpsProtocol {

    public function handle($request, Closure $next)
    {

        if (App::environment() === 'production' || App::environment() === 'development') {
            // for Proxies
            Request::setTrustedProxies([$request->getClientIp()], 
                Request::HEADER_X_FORWARDED_ALL);

            if (!$request->isSecure()) {
                return redirect()->secure($request->getRequestUri());
            }
        }
        return $next($request); 
    }
}

?>
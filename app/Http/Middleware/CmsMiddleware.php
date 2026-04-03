<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CmsMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Only inject if it's an HTML response and the user is an admin
        // For development, we can check a simple session flag or Auth
        if ($this->shouldInjectCms($request, $response)) {
            $this->injectCmsAssets($response);
        }

        return $response;
    }

    protected function shouldInjectCms(Request $request, Response $response): bool
    {
        // Simple check: user is logged in
        return $request->user() && 
               str_contains($response->headers->get('Content-Type'), 'text/html');
    }

    protected function injectCmsAssets(Response $response): void
    {
        $content = $response->getContent();
        
        $toolbar = view('cms.toolbar')->render();
        $assets = view('cms.assets')->render();

        $injection = $toolbar . $assets;
        
        // Inject before </body>
        $pos = strripos($content, '</body>');
        if ($pos !== false) {
            $content = substr($replace = $content, 0, $pos) . $injection . substr($content, $pos);
            $response->setContent($content);
        }
    }
}

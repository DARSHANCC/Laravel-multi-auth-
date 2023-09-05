<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // print_r($request->all());
        // echo $this->previous_route() ;
        // die;
        return $request->expectsJson() ? null : ('admin.dashboard' == $this->previous_route()? route('admin.login'):route('login'));
    }

    public function previous_route()
    {
        $previousRequest = app('request')->create(app('url')->current());

        try {
            $routeName = app('router')->getRoutes()->match($previousRequest)->getName();
        } catch (NotFoundHttpException $exception) {
            return null;
        }

        return $routeName;
    }
}

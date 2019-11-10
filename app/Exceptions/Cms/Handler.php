<?php

namespace App\Exceptions\Cms;

use Illuminate\Support\Facades\View;
use App\Exceptions\Handler as BaseHandler;

class Handler extends BaseHandler
{
    /**
     * Register the error template hint paths.
     *
     * @return void
     */
    protected function registerErrorViewPaths()
    {
        $paths = collect(config('view.paths'));

        View::replaceNamespace('errors', $paths->map(function ($path) {
            return "{$path}/cms/errors";
        })->push(__DIR__.'/views')->all());
    }
}

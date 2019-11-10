@extends('cms.layouts.master')
@section('title', '404 Page not found')

@section('content')
<div class="container" style="margin-top: 7%">
    <div class="login-logo">
        <b>{{ config('app.name') }}</b>
    </div>
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-primary"> 404</h2>
            <div class="error-content">
                <h3>
                	<i class="fas fa-exclamation-triangle text-primary"></i> Oops! Page not found.
                </h3>
                <p>
                    We could not find the page you were looking for.
                    Please double check your request syntax.
                </p>
            </div><!-- /.error-content -->
        </div><!-- /.error-page -->
    </section>
</div>
@endsection
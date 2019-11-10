@extends('cms.layouts.master')
@section('title', '503 Service is unavailable')

@section('content')
<div class="container" style="margin-top: 7%">
    <div class="login-logo">
        <b>{{ config('app.name') }}</b>
    </div>
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-danger"> 503</h2>
            <div class="error-content">
                <h3>
                	<i class="fas fa-exclamation-triangle text-danger"></i> Oops! Service is unavailble.
                </h3>
                <p>
                    The system is now under maintenance mode. Please come back later.
                    We apologize for the inconvenience.
                </p>
            </div><!-- /.error-content -->
        </div><!-- /.error-page -->
    </section>
</div>
@endsection
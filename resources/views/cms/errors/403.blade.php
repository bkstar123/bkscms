@extends('cms.layouts.master')
@section('title', '403 Unauthorization')

@section('content')
<div class="container" style="margin-top: 7%">
	<div class="login-logo">
        <b>{{ config('app.name') }}</b>
    </div>
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-yellow"> 403</h2>
            <div class="error-content">
                <h3>
                	<i class="fas fa-exclamation-triangle text-yellow"></i> Oops! Unauthorized action.
                </h3>
                <p>
                    You are not authorized to perform this request. Please contact your system administrator
                    for access elevation.
                </p>
            </div><!-- /.error-content -->
        </div><!-- /.error-page -->
    </section>
</div>
@endsection
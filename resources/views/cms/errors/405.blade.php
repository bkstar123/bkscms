@extends('cms.layouts.master')
@section('title', '405 Bad Request')

@section('content')
<div class="container" style="margin-top: 7%">
    <div class="login-logo">
        <b>{{ config('app.name') }}</b>
    </div>
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-primary"> 405</h2>
            <div class="error-content">
                <h3>
                	<i class="fas fa-exclamation-triangle text-primary"></i> Oops! Bad request.
                </h3>
                <p>
                    The request that you performed is invalid.
                    Please double check your request syntax.
                </p>
            </div><!-- /.error-content -->
        </div><!-- /.error-page -->
    </section>
</div>
@endsection
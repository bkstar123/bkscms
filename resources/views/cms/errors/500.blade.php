@extends('cms.layouts.master')
@section('title', '500 Internal Server Error')

@section('content')
<div class="container" style="margin-top: 7%">
    <div class="login-logo">
        <b>{{ config('app.name') }}</b>
    </div>
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-danger"> 500</h2>
            <div class="error-content">
                <h3>
                	<i class="fas fa-exclamation-triangle text-danger"></i> Oops! Internal Server Error.
                </h3>
                <p>
                    There is an unknown internal server error. We are sorry for the inconvenience.
                    Please come back later.
                </p>
            </div><!-- /.error-content -->
        </div><!-- /.error-page -->
    </section>
</div>
@endsection
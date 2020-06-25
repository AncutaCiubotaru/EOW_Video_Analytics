@extends('layout')

@section('content')
    <div class="container-fluid">
        <div class="row mt-3 ml-5">
            <div class="col-6 embed-responsive embed-responsive-16by9">
                <iframe class = "v_player" src="https://player.vimeo.com/video/19802513"  webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>
            <div class="col-6 embed-responsive embed-responsive-16by9">
                <iframe class = "v_player" src="https://player.vimeo.com/video/47208316"  webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>
        </div>
        <div class="row mt-3 ml-5">
            <div class="col-6 embed-responsive embed-responsive-16by9">
                <iframe class = "v_player" src="https://player.vimeo.com/video/149256047"  webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>
            <div class="col-6 embed-responsive embed-responsive-16by9">
                <iframe class = "v_player" src="https://player.vimeo.com/video/14925704"  webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://player.vimeo.com/api/player.js"></script>
    <script src="{{ asset('js/app.js')}}" type="module"></script>

@endsection
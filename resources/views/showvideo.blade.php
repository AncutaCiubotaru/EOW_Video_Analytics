@extends('layout')

@section('content')
    <div class="container-fluid">
        <div class="row mt-3 ml-5">
            <div class="col-6 embed-responsive embed-responsive-16by9">
                <iframe src="https://player.vimeo.com/video/{{$id}}"  webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script
            src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://player.vimeo.com/api/player.js"></script>
    <script src="{{ asset('js/app.js')}}" type="module"></script>

@endsection
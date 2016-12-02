@extends('app')

@section('title', '')

@section('content')

    <!-- Display successful delete -->
    @if(Session::has('success'))
        <div class="alert alert-dismissable alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ Session::get('success') }}</strong>
        </div>
    @endif

    <div class="container-fluid">
        <div class="row">
            @foreach($thumbnails as $thumbnail)
                <div class="clearfix visible-xs-block"></div>
                <div class="col-xs-6 col-sm-3 col-centered">
                    <a href="{{ Storage::url($fullsized[$loop->index]) }}" data-lightbox="gallery" data-title="{{ pathinfo($thumbnail, PATHINFO_FILENAME) }}
                             <a class='fa fa-btn fa-trash' href='delete/{{ pathinfo($thumbnail, PATHINFO_BASENAME) }}'></a>
                             <a class='fa fa-btn fa-link' target='_blank' href='view/{{ pathinfo($thumbnail, PATHINFO_BASENAME) }}'></a>">
                        <img class="img-rounded" src="{{ Storage::url($thumbnail) }}" />
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
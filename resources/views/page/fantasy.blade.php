@extends('layouts.app')

@section('title')
    Fantasy
@endsection

@section('content')
    <br><br>
    <div class="container-lg">
        <h4 style="float: left; font-family: 'Ubuntu sans', sans-serif; font-weight: 600;">Fantasy @if ($page == 1)
            @else
                <span>
                    <h6 style="font-family: 'Roboto', sans-serif; font-weight: normal; font-size: 14px;">Page
                        {{ $page }}</h6>
                </span>
            @endif
        </h4>
        <h6 class="" style="float: right; font-family: 'Ubuntu sans', sans-serif; font-weight: normal"><span
                style="margin-right: 5px; font-size: 14px"><a href="{{ url('/') }} "
                    class="text-decoration-none text-dark text-muted">Home</a></span> <i class="fa fa-arrow-right text-muted"
                style="font-size: 13px" aria-hidden="true"></i> <span style="margin-left: 5px; font-size: 14px"
                class="text-muted">Fantasy</span></h6>
    </div>

    <br><br>
    <hr>
    <div class="container-lg mt-4">
        <div class="row">
            @unless (count($paginatedResults) == 0)
                @foreach ($paginatedResults as $fantasy)
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mt-3">
                        <a href="{{ route('media.show', ['name'=>$fantasy->originalTitleText]) }}"><img
                                src="{{ asset('storage/images/' . $fantasy->imageUrl) }}" alt="{{ $fantasy->full_name . ' ' . '(' . $fantasy->releaseYear . ')' }}" class="img-fluid" loading="lazy"></a>


                        <a href="{{ route('media.show', ['name'=>$fantasy->originalTitleText]) }}"
                            class="text-decoration-none text-reset" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="{{ $fantasy->full_name . ' ' . '(' . $fantasy->releaseYear . ')' }}">

                            <h6 class="mt-2 text-truncate" style="font-family: 'Roboto', sans-serif; font-weight: 500; font-weight: bold; font-size: 14px;">
                                {{ $fantasy->full_name . ' ' . '(' . $fantasy->releaseYear . ')' }}</h6>
                        </a>
                        <h6 class="text-truncate" style="font-size: 13px; font-family: 'Roboto', sans-serif; font-weight: 400; margin-top: -4px;">
                            {{ $fantasy->genres }}</h6>
                    </div>
                @endforeach
            @endunless
        </div>

        <div class="mt-3">
            {{ $paginatedResults->onEachSide(2)->links('vendor.pagination.bootstrap-5') }}
        </div>

        
    </div>
@endsection

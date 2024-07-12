@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')

    <div class="container-lg mt-5">

        {{-- OWLCAROUSEL PANE --}}
        <h4 style="font-weight: 600;"><span>New Seasons & Episodes</span>
            @unless (count($seasons) == 0)
                <span style="float: right;">
                    <button class="customPrevBtn">‹</button>
                    <button class="customNextBtn">›</button>
                </span>
            @endunless
        </h4>
        <div class="owl-carousel owl-theme">
            {{-- <div class="item">
                <h4>1</h4>
            </div> --}}
            @unless (count($seasons) == 0)
                @foreach ($seasons as $series)
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-1 item">
                        <a href="{{ route('media.show', ['name' => $series->movieName]) }}" class="image-container"><img
                                src="{{ asset('storage/uploads/' . $series->imageUrl) }}"
                                alt="{{ $series->full_name . ' ' . 'Season ' . $series->season_number . ' Episode ' . $series->episode_number }}"
                                class="img-fluid blurry-image lazy" id="img-scale" style="background: rgba(0, 0, 0, 0.315); width: 100%;"
                                loading="lazy"
                                srcset="{{ asset('storage/uploads/' . $series->imageUrl) }} 300w, {{ asset('storage/uploads/' . $series->imageUrl) }} 600w, {{ asset('storage/uploads/' . $series->imageUrl) }} 1200w"
                                sizes="(max-width: 600px) 300px, (max-width: 900px) 600px, 1200px">
                        </a>

                        <a href="{{ route('media.show', ['name' => $series->movieName]) }}"
                            class="text-decoration-none text-reset" data-bs-toggle="tooltip" data-bs-placement="bottom"
                            data-bs-title="{{ $series->full_name . ' ' . 'Season ' . $series->season_number . ' Episode ' . $series->episode_number }}">

                            <h6 class="mt-1"
                                style="font-family: 'Roboto', sans-serif; font-weight: 500; font-weight: bold; font-size: 13px;">
                                {{ $series->full_name . ' ' . 'Season ' . $series->season_number . ' Episode ' . $series->episode_number }}
                                (Added)
                            </h6>
                        </a>

                    </div>
                @endforeach
            @endunless
        </div>
    </div>

    <hr class="mt-5">

    <div class="container-lg mt-5">

        {{-- SERIES PANE --}}
        <h4 style="font-weight: 600;">New Series</h4>
        <div class="row">
            @unless (count($series_all) == 0)
                @foreach ($series_all as $series)
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mt-3">
                        <a href="{{ route('media.show', ['name' => $series->originalTitleText]) }}">
                            <img src="{{ asset('storage/images/' . $series->imageUrl) }}"
                                alt="{{ str_replace(['-', $series->movieId], ' ', $series->originalTitleText) . ' ' . '(' . $series->releaseYear . ')' }}"
                                class="img-fluid blurry-image lazy" style="background: rgba(0, 0, 0, 0.315); width: 100%;" loading="lazy"
                                srcset="{{ asset('storage/images/' . $series->imageUrl) }} 300w, {{ asset('storage/images/' . $series->imageUrl) }} 600w, {{ asset('storage/images/' . $series->imageUrl) }} 1200w"
                                sizes="(max-width: 600px) 300px, (max-width: 900px) 600px, 1200px">
                        </a>

                        <a href="{{ route('media.show', ['name' => $series->originalTitleText]) }}"
                            class="text-decoration-none text-reset" data-bs-toggle="tooltip" data-bs-placement="bottom"
                            data-bs-title="{{ str_replace(['-', $series->movieId], ' ', $series->originalTitleText) . ' ' . '(' . $series->releaseYear . ')' }}">

                            <h6 class="mt-2 text-truncate"
                                style="font-family: 'Roboto', sans-serif; font-weight: 500; font-weight: bold; font-size: 13px;">
                                {{ $series->full_name . ' ' . '(' . $series->releaseYear . ')' }}
                            </h6>
                        </a>
                        @if ($series->genres == 0)
                            <h6 class="text-truncate"
                                style="font-size: 12px; font-family: 'Roboto', sans-serif; font-weight: 400; margin-top: -4px;">
                                {{ $series->genres = 'N/A' }}</h6>
                        @elseif ($series->genres == '')
                            <h6 class="text-truncate"
                                style="font-size: 12px; font-family: 'Roboto', sans-serif; font-weight: 400; margin-top: -4px;">
                                {{ $series->genres = 'N/A' }}</h6>
                        @else
                            <h6 class="text-truncate"
                                style="font-size: 12px; font-family: 'Roboto', sans-serif; font-weight: 400; margin-top: -4px;">
                                {{ $series->genres }}</h6>
                        @endif
                    </div>
                @endforeach
            @endunless
        </div>

        @if (count($series_all) >= 18)
            <div class="mt-4 text-center">
                <a href="{{ route('moreseries') }}" class="btn btn-primary" id="show-more">Show More</a>
            </div>
        @else
            {{-- Do nothing --}}
        @endif
    </div>

    <hr class="mt-5">

    <div class="container-lg mt-5 mb-5">

        {{-- MOVIES PANE --}}
        <h4 style="font-weight: 600;">New Movies</h4>
        <div class="row">
            @unless (count($movies_all) == 0)
                @foreach ($movies_all as $movies)
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mt-2">
                        <a href="{{ url($movies->originalTitleText) }}" class="text-decoration-none text-reset"><img
                                src="{{ asset('storage/images/' . $movies->imageUrl) }}"
                                alt="{{ str_replace(['-', $movies->releaseYear], ' ', $movies->originalTitleText) . ' ' . '(' . $movies->releaseYear . ')' }}"
                                class="img-fluid blurry-image lazy" style="background: rgba(0, 0, 0, 0.315); width: 100%;" loading="lazy"
                                srcset="{{ asset('storage/images/' . $movies->imageUrl) }} 300w, {{ asset('storage/images/' . $movies->imageUrl) }} 600w, {{ asset('storage/images/' . $movies->imageUrl) }} 1200w"
                                sizes="(max-width: 600px) 300px, (max-width: 900px) 600px, 1200px"></a>

                        <a href="{{ url($movies->originalTitleText) }}" class="text-decoration-none text-reset"
                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                            data-bs-title="{{ $movies->full_name . ' ' . '(' . $movies->releaseYear . ')' }}">

                            <h6 class="mt-2 text-truncate"
                                style="font-family: 'Roboto', sans-serif; font-weight: 500; font-weight: bold; font-size: 13px;">
                                {{ $movies->full_name . ' ' . '(' . $movies->releaseYear . ')' }}
                            </h6>
                        </a>
                        @if ($movies->genres == 0)
                            <h6 class="text-truncate"
                                style="font-size: 12px; font-family: 'Roboto', sans-serif; font-weight: 400; margin-top: -4px;">
                                {{ $movies->genres = 'N/A' }}</h6>
                        @elseif ($movies->genres == '')
                            <h6 class="text-truncate"
                                style="font-size: 12px; font-family: 'Roboto', sans-serif; font-weight: 400; margin-top: -4px;">
                                {{ $movies->genres = 'N/A' }}</h6>
                        @else
                            <h6 class="text-truncate"
                                style="font-size: 12px; font-family: 'Roboto', sans-serif; font-weight: 400; margin-top: -4px;">
                                {{ $movies->genres }}</h6>
                        @endif
                    </div>
                @endforeach
            @endunless
        </div>


        @if (count($movies_all) >= 18)
            <div class="mt-4 text-center">
                <a href="{{ route('moremovies') }}" class="btn btn-primary" id="show-more">Show More</a>
            </div>
        @else
            {{-- Do nothing else --}}
        @endif
    </div>
@endsection

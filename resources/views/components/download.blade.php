@extends('layouts.app')

@section('title')
    @foreach ($download_series as $item)
        {{ $item->movieName }} Season {{ $item->season_number }} Episode {{ $item->episode_number }}
    @endforeach
@endsection

@section('content')

    <div class="container mt-3">
        @unless (count($download_series) == 0)
            @foreach ($download_series as $item)
                <div class="col-xl-7 m-auto">
                    <div class="card border-0">
                        
                        <div class="card-body text-center">
                            <img style="border-radius: 5px;" src="{{ asset('storage/uploads/' . $item->imageUrl)}}" alt="" width="250">
                            <h5 class="card-title mt-3" style="font-size: 16px;">{{ str_replace(['-', $item->movieId], ' ', $item->full_name) }}</h5>
                            <h6 class="card-subtitle mb-1 text-muted" style="font-size: 15px;">Season {{ $item->season_number }} Episode {{ $item->episode_number }}</h6>
                            
                            <button class="btn btn-outline-primary btn-md mt-3" style="font-size: 13px; text-transform: uppercase" id="show-more">Download</button>
                        </div>
                    </div>
                </div>
            @endforeach
        @endunless
    </div>
@endsection

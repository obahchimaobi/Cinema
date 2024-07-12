@extends('layouts.app')

@section('content')
    <style>
        .accord-btn:focus {
            background: transparent;
        }
    </style>
    <div class="container-lg mt-5">

        @if ($all)
            @if ($all->isNotEmpty())
                <!-- Check if the collection is not empty -->
                @foreach ($all->unique('movieId') as $item)
                    {{-- THIS IS A SERIES PANE --}}
                    @if ($item->titleType == 'series')
                        @section('title')
                            {{ $item->full_name }}
                        @endsection
                        <!-- Iterate over each item in the collection -->
                        <h3 class="d-xl-block d-none d-md-block d-sm-block d-lg-block"
                            style="font-family: 'Roboto', sans-serif; font-size: 20px;">
                            {{ $item->full_name }}
                        </h3>
                        <div class="row">
                            <div class="col-xl-2 col-sm-4 col-md-4 col-lg-3 col-12">
                                <img src="{{ asset('storage/images/' . $item->imageUrl) }}" alt=""
                                    class="img-fluid blurry-image lazy" style="width: 100%; background: rgba(0, 0, 0, 0.493)"
                                    loading="lazy">
                            </div>

                            <div class="col-xl-8 col-sm-8 col-lg-5 col-md-8 mt-xl-4" style="font-size: 15px;">
                                <div>
                                    <h4 class="d-xl-none d-block d-md-none d-sm-none d-lg-none mt-3"
                                        style="font-family: 'Roboto', sans-serif; font-size: 20px;">
                                        {{ $item->full_name }}
                                    </h4>

                                    <h6 style="font-size: 13px; font-family: 'Ubuntu sans', sans-serif; font-weight: normal;"
                                        class="mt-3 mt-xl-0">
                                        <i class="fa fa-star" aria-hidden="true" style="font-size: 11px"></i>

                                        {{ isset($item->aggregateRating) ? $item->aggregateRating : 'N/A' }}
                                    </h6>
                                    <h6
                                        style="font-size: 13px; font-family: 'Ubuntu sans', sans-serif; font-weight: normal;">
                                        Release
                                        year:
                                        {{ $item->releaseYear }}</h6>


                                    @if ($item->genres == '0')
                                        <h6
                                            style="font-size: 13px; font-family: 'Ubuntu sans', sans-serif; font-weight: normal;">
                                            Genre:
                                            N/A
                                        </h6>
                                    @elseif ($item->genres == '')
                                        <h6
                                            style="font-size: 13px; font-family: 'Ubuntu sans', sans-serif; font-weight: normal;">
                                            Genre:
                                            N/A
                                        </h6>
                                    @else
                                        <h6
                                            style="font-size: 13px; font-family: 'Ubuntu sans', sans-serif; font-weight: normal;">
                                            Genre: {{ $item->genres }}
                                        </h6>
                                    @endif

                                    @if ($item->language == '0')
                                        <h6
                                            style="font-size: 13px; font-family: 'Ubuntu sans', sans-serif; font-weight: normal;">
                                            Language:
                                            N/A
                                        </h6>
                                    @elseif ($item->language == '')
                                        <h6
                                            style="font-size: 13px; font-family: 'Ubuntu sans', sans-serif; font-weight: normal;">
                                            Language:
                                            N/A
                                        </h6>
                                    @else
                                        <h6
                                            style="font-size: 13px; font-family: 'Ubuntu sans', sans-serif; font-weight: normal;">
                                            Language: {{ strtolower($item->language) }}
                                        </h6>
                                    @endif

                                    @if ($item->country == '0')
                                        <h6
                                            style="font-size: 13px; font-family: 'Ubuntu sans', sans-serif; font-weight: normal;">
                                            Country:
                                            N/A
                                        </h6>
                                    @elseif ($item->country == '')
                                        <h6
                                            style="font-size: 13px; font-family: 'Ubuntu sans', sans-serif; font-weight: normal;">
                                            Country:
                                            N/A
                                        </h6>
                                    @else
                                        <h6
                                            style="font-size: 13px; font-family: 'Ubuntu sans', sans-serif; font-weight: normal;">
                                            Country: {{ $item->country }}
                                        </h6>
                                    @endif

                                    <div class="mt-3">

                                        <span
                                            style="font-size: 13px;">{{ $item->plotText ? $item->plotText : 'N/A' }}</span>
                                        <br>

                                        <button class="mt-2 btn btn-outline-primary btn-md"
                                            data-bs-target="#exampleModalToggle2" data-bs-toggle="modal"
                                            style="border-radius: 5px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; padding-right: 15px; padding-left: 15px; font-weight: bolder; font-size: 13px; padding-top: 12px; padding-bottom: 10px">{{ Str::upper('Watch Trailer') }}
                                        </button>

                                        <div class="modal fade" id="exampleModalToggle2" aria-hidden="true"
                                            aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered modal-lg border-0">
                                                <div class="modal-content p-n3 custom-modal-content border-0"
                                                    style="border-radius: 0px; background: transparent;">
                                                    {{-- <div class="modal-header"></div> --}}
                                                    <div class="modal-body">
                                                        <iframe src="{{ $item->trailer ? $item->trailer : 'N/A' }}"
                                                            title="YouTube video player" frameborder="0"
                                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                            allowfullscreen style="width: 100%; aspect-ratio: 4/2.3; border-radius: 5px;">
                                                        </iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    @endif

                    {{-- THIS IS A MOVIES PANE --}}
                    @if ($item->titleType == 'movie')
                        @section('title')
                            {{ $item->full_name }}
                        @endsection
                        <!-- Iterate over each item in the collection -->
                        <h3 class="d-xl-block d-none d-md-block d-sm-block d-lg-block"
                            style="font-family: 'Roboto', sans-serif; font-size: 20px;">
                            {{ $item->full_name }}
                        </h3>
                        <div class="row">
                            <div class="col-xl-2 col-sm-4 col-md-4 col-lg-4 col-12">
                                <img data-src="{{ asset('storage/images/' . $item->imageUrl) }}" alt=""
                                    class="img-fluid blurry-image lazy " style="background: rgba(0, 0, 0, 0.493);"
                                    loading="lazy">
                            </div>

                            <div class="col-xl-8 col-sm-8 col-lg-5 col-md-8 mt-xl-3" style="font-size: 15px;">
                                <div>
                                    <h4 class="d-xl-none d-block d-md-none d-sm-none d-lg-none mt-3"
                                        style="font-family: 'Roboto', sans-serif; font-size: 19px;">
                                        {{ $item->full_name }}
                                    </h4>
                                    <h6 style="font-size: 13px; font-family: 'Ubuntu sans', sans-serif; font-weight: normal;"
                                        class="mt-3 mt-xl-0">
                                        <i class="fa fa-star" aria-hidden="true" style="font-size: 11px"></i>

                                        {{ isset($item->aggregateRating) ? $item->aggregateRating : 'N/A' }}
                                    </h6>
                                    <h6
                                        style="font-size: 13px; font-family: 'Ubuntu sans', sans-serif; font-weight: normal;">
                                        Release
                                        year:
                                        {{ $item->releaseYear }}</h6>


                                    @if ($item->genres == '0')
                                        <h6
                                            style="font-size: 13px; font-family: 'Ubuntu sans', sans-serif; font-weight: normal;">
                                            Genre:
                                            N/A
                                        </h6>
                                    @elseif ($item->genres == '')
                                        <h6
                                            style="font-size: 13px; font-family: 'Ubuntu sans', sans-serif; font-weight: normal;">
                                            Genre:
                                            N/A
                                        </h6>
                                    @else
                                        <h6
                                            style="font-size: 13px; font-family: 'Ubuntu sans', sans-serif; font-weight: normal;">
                                            Genre: {{ $item->genres }}
                                        </h6>
                                    @endif

                                    @if ($item->runtime == '0')
                                        <h6
                                            style="font-size: 13px; font-family: 'Ubuntu sans', sans-serif; font-weight: normal;">
                                            Runtime:
                                            N/A
                                        </h6>
                                    @elseif ($item->runtime == '')
                                        <h6
                                            style="font-size: 13px; font-family: 'Ubuntu sans', sans-serif; font-weight: normal;">
                                            Runtime:
                                            N/A
                                        </h6>
                                    @else
                                        <h6
                                            style="font-size: 13px; font-family: 'Ubuntu sans', sans-serif; font-weight: normal;">
                                            Runtime: {{ $item->runtime }}
                                        </h6>
                                    @endif

                                    @if ($item->country == '0')
                                        <h6
                                            style="font-size: 13px; font-family: 'Ubuntu sans', sans-serif; font-weight: normal;">
                                            Country:
                                            N/A
                                        </h6>
                                    @elseif ($item->country == '')
                                        <h6
                                            style="font-size: 13px; font-family: 'Ubuntu sans', sans-serif; font-weight: normal;">
                                            Country:
                                            N/A
                                        </h6>
                                    @else
                                        <h6
                                            style="font-size: 13px; font-family: 'Ubuntu sans', sans-serif; font-weight: normal;">
                                            Country: {{ $item->country }}
                                        </h6>
                                    @endif

                                    <div class="mt-3">

                                        <span
                                            style="font-size: 13px;">{{ $item->plotText ? $item->plotText : 'N/A' }}</span>
                                        <br>

                                        <button class="mt-2 btn btn-outline-primary btn-md"
                                            data-bs-target="#exampleModalToggle2" data-bs-toggle="modal"
                                            style="border-radius: 5px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; padding-right: 15px; padding-left: 15px; font-weight: bolder; font-size: 13px; padding-top: 12px; padding-bottom: 10px">{{ Str::upper('Watch Trailer') }}
                                        </button>

                                        <a href="{{ $item->download_url }}" target="_blank" class="mt-2 btn btn-outline-primary btn-md"
                                        style="border-radius: 5px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; padding-right: 15px; padding-left: 15px; font-weight: bolder; font-size: 13px; padding-top: 12px; padding-bottom: 10px; margin-left: 5px;">{{ Str::upper('Download') }}
                                        <i class="fa fa-download" aria-hidden="true"></i></a>

                                        <div class="modal fade" id="exampleModalToggle2" aria-hidden="true"
                                            aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered modal-lg border-0">
                                                <div class="modal-content p-n3 custom-modal-content border-0"
                                                    style="border-radius: 0px; background: transparent;">
                                                    {{-- <div class="modal-header"></div> --}}
                                                    <div class="modal-body col-xl-12">
                                                        <iframe src="{{ $item->trailer ? $item->trailer : 'N/A' }}"
                                                            title="YouTube video player" frameborder="0"
                                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                            allowfullscreen style="width: 100%; aspect-ratio: 4/2.3; border-radius: 5px;">
                                                        </iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    @endif
                @endforeach
            @else
                <p style="font-size: 13px;" style="text-muted">No data found for this title.</p>
            @endif
        @endif


        <hr class="mt-4">
    </div>

    <div class="container-lg">
        <div class="row">
            <div class="col-xl-9 col-lg-8 mt-3 mb-5">
                @if (isset($item))
                    @if ($item->titleType == 'movie')
                        <h5 style="font-weight: 700;">You may also like:</h5>
                        <div class="row">

                            @foreach ($merged as $more)
                                <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-3 mt-2">
                                    <a href="{{ route('media.show', ['name' => $more->originalTitleText]) }}"><img
                                            src="{{ asset('storage/images/' . $more->imageUrl) }}" alt=""
                                            class="img-fluid blurry-image lazy" style=" background: rgba(0, 0, 0, 0.493)"
                                            loading="lazy"></a>

                                    <a href="{{ route('media.show', ['name' => $more->originalTitleText]) }}"
                                        class="text-decoration-none text-reset">
                                        <h6 class="mt-1 text-truncate"
                                            style="font-family: 'Roboto', sans-serif; font-weight: 500; font-weight: bold; font-size: 13px;"
                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            data-bs-title="{{ $more->full_name . ' ' . '(' . $more->releaseYear . ')' }}">
                                            {{ $more->full_name }}</h6>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @elseif ($item->titleType == 'series')
                        <div class="row mb-3">

                            @foreach ($seasons as $more)
                                <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-3 mt-2">
                                    <a
                                        href="{{ route('download', ['name' => $more->movieName, 'season' => $more->season_number, 'episode' => $more->episode_number]) }}"><img
                                            src="{{ asset('storage/uploads/' . $more->imageUrl) }}" alt=""
                                            class="img-fluid" style="background: rgba(0, 0, 0, 0.493)"
                                            loading="lazy"></a>

                                    <a href="{{ route('download', ['name' => $more->movieName, 'season' => $more->season_number, 'episode' => $more->episode_number]) }}"
                                        class="text-decoration-none text-reset">
                                        <h6 class="mt-1"
                                            style="font-family: 'Roboto', sans-serif; font-weight: 500; font-weight: bold; font-size: 13px;">
                                            Season
                                            {{ $more->season_number }} Episode {{ $more->episode_number }}
                                        </h6>
                                    </a>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-5">
                            {{ $seasons->onEachSide(2)->links('vendor.pagination.bootstrap-5') }}
                        </div>

                        @if (count($seasons) == 0)
                            <p style="font-size: 13px; margin-top: -50px;" class="text-muted">No data for this title</p>
                        @endif
                    @endif
                @else
                    {{ abort(404) }}
                @endif

                <hr class="mt-4 mb-4">

                <div class="mt-4">
                    <h5 class="mb-3" style="font-weight: 700;">Comment</h5>
                    @if (session('success'))
                        <script>
                            const Toast = Swal.mixin({
                                toast: true,
                                position: "top-end",
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.onmouseenter = Swal.stopTimer;
                                    toast.onmouseleave = Swal.resumeTimer;
                                }
                            });
                            Toast.fire({
                                icon: "success",
                                title: "Comment added successfully"
                            });
                        </script>
                    @endif

                    @if (isset($comments) && count($comments) > 0)
                        <div class="container-xl">
                            @foreach ($comments as $comment)
                                <div class="row mt-2 pt-3 border"
                                    style="border-radius: 5px;">
                                    <div class="col-xl-6 col-lg-9 col-md-9 col-sm-9">
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-4 col-md-4">
                                                <i class="fas fa-user-circle" style="font-size: 50px;"></i>
                                            </div>
                                            <div class="col-xl-8 col-lg-8 col-md-8">
                                                <h5 style="font-size: 17px" class="mt-0">
                                                    {{ $comment->commentor }} <strong
                                                        style="padding-right: 4px; padding-left: 4px;">·</strong> <span
                                                        style="font-size: 12px; font-family: 'Ubuntu sans', sans-serif;">{{ $comment->created_at->diffForHumans() }}</span>
                                                </h5>

                                                <p style="font-size: 13px">
                                                    {{ $comment->comment }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-3 col-md-3 col-sm-3">
                                        <p class="d-inline-flex gap-1 ml-5 pl-5" style="margin-left: 100px">
                                            <a class="btn btn-primary btn-sm" data-bs-toggle="collapse"
                                                href="#{{ $comment->id }}" role="button" aria-expanded="false"
                                                aria-controls="collapseExample">
                                                <i class="fa fa-reply" aria-hidden="true"></i>
                                            </a>
                                        </p>

                                    </div>

                                    <div class="mt-2 text-center col-xl-10 m-auto">

                                        @if (count($replies->where('comment_id', $comment->id)) > 0)
                                            <h6 class="text-center">- Replies -</h6>
                                        @endif

                                        @unless (count($replies) == 0)
                                            @foreach ($replies->where('comment_id', $comment->id) as $reply)
                                                <div class="row mt-2 border p-2" style="border-radius: 5px">
                                                    <div class="col-xl-5">
                                                        <h6>{{ $reply->reply_name }} <span
                                                                style="font-family: 'Ubuntu sans', sans-serif; font-weight: normal; font-size: 13px">[{{ $reply->created_at }}]</span>
                                                        </h6>
                                                    </div>

                                                    <div class="col-xl-7" style="font-size: 14px">
                                                        {{ $reply->reply_text }}
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endunless
                                    </div>

                                    <div class="collapse mt-3 mb-3" id="{{ $comment->id }}">
                                        <div class="card card-body" style="border-radius: 5px">
                                            <form action="{{ route('reply', ['name' => $item->originalTitleText]) }}"
                                                method="post">
                                                {{ csrf_field() }}

                                                <input type="hidden" value="{{ $comment->id }}" name="comment_id">
                                                <input type="hidden" value="{{ $item->originalTitleText }}"
                                                    name="movie_name">
                                                <input type="hidden" value="{{ $item->movieId }}" name="movie_id">

                                                <label for="" style="font-size: 13px">Name: </label>
                                                <input type="text" class="form-control" name="reply_name"
                                                    style="border-radius: 0px" required>

                                                <label for="" class="mt-3" style="font-size: 13px">Your
                                                    reply:
                                                </label>
                                                <textarea name="reply_text" id="" cols="30" rows="5" class="form-control"
                                                    style="border-radius: 0px" required></textarea>

                                                <div class="mt-3">
                                                    <button class="btn btn-primary btn-sm"
                                                        style="border-radius: 4px; font-weight: bold; padding-right: 15px; padding-left: 15px;">Reply</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    @else
                        <p class="text-muted" style="font-size: 13px">*No comments yet for this movie. Be the first to
                            comment*</p>
                    @endif
                </div>

                {{-- ADD COMMENT SECTION --}}
                <div class="mt-4">
                    <form action="{{ route('comment', ['name' => $item->originalTitleText, 'id' => $item->id]) }}"
                        method="post">
                        {{ csrf_field() }}

                        <input type="text" class="form-control pt-2 pb-2 pl-3" placeholder="Name" name="commentor"
                            style="border-radius: 0px; font-size: 13px;" required>

                        <textarea name="comment" id="" cols="30" rows="5" class="form-control mt-2"
                            style="border-radius: 0px; box-shadow: none; font-size: 13px;" required placeholder="Your Comment"></textarea>

                        <div class="mt-3">
                            <button class="btn btn-primary"
                                style="border-radius: 5px; font-size: 14px; font-weight: bolder; padding-right: 15px; padding-left: 15px;">Post</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 mt-4" style="border-left: 1px solid rgba(0, 0, 0, 0.349)">
                <div class="mb-5">
                    <h5 style="font-weight: 700;">Recommended Shows </h5>
                    @unless (count($recom) == 0)
                        @foreach ($recom as $recommended)
                            <div class="accordion accordion-flush border"
                                style="box-shadow: none; border: none; border-radius: 3px" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" style="font-size: 14px;">
                                        <button class="accordion-button collapsed accord-btn" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#recommend-{{ $recommended->movieId }}"
                                            aria-expanded="false" aria-controls="flush-collapseOne" style="font-size: 13px;">
                                            {{ $recommended->full_name }}
                                        </button>
                                    </h2>

                                    <div id="recommend-{{ $recommended->movieId }}" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body" style="font-size: 13px">
                                            {{ Str::substr($recommended->plotText, 0, 200) }}... <a
                                                href="{{ route('media.show', ['name' => $recommended->originalTitleText]) }} ">More
                                                Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endunless
                </div>
            </div>
        </div>
    </div>
@endsection

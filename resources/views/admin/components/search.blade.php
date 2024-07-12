@extends('admin.layouts.app')

@section('title')
    Search
@endsection

@section('content')
    <div class="mt-5 main" id="main">
        <div class="m-auto">
            <table class="table table-hover table-bordered datatable">
                <thead>
                    <tr style="font-size: 15px;">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Country</th>
                        <th scope="col">Release Year</th>
                        <th scope="col">Title Type</th>
                        <th scope="col">Download URL</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @unless (count($merge) == 0)
                        @php
                            $serial = 1;
                        @endphp
                        @foreach ($merge as $item)
                            <tr style="font-size: 15px;">
                                <th scope="row">{{ $serial++ }}</th>
                                <td>{{ $item->full_name }}</td>
                                <td>{{ $item->country }}</td>
                                <td>{{ $item->releaseYear }}</td>
                                <td>{{ $item->titleType }}</td>
                                <td>{{ $item->download_url }}</td>
                                <td>
                                    @if ($item->titleType == 'movie')
                                        <a href="{{ route('edit.movie', ['id'=>$item->id]) }}" class="btn btn-outline-success btn-sm">Edit <i class="fa fa-edit"
                                                aria-hidden="true"></i></a>
                                    @else
                                        <a href="{{ route('edit.series', ['id'=>$item->id]) }}" class="btn btn-outline-success btn-sm">Edit <i class="fa fa-edit"
                                                aria-hidden="true"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endunless
                </tbody>
            </table>
        </div>
    </div>
@endsection

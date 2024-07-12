@extends('admin.layouts.app')

@section('title')
    Seasons
@endsection

@section('content')

    @if (session('status'))
        <h6 class="alert alert-success">{{ session('status') }}</h6>
    @endif

    @if (session('error'))
        <h6 class="alert alert-danger">{{ session('error') }}</h6>
    @endif

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Data Tables</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item active">Data</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Pending Seasons</h5>
                            <p>Add lightweight datatables to your project with using the <a
                                    href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple
                                    DataTables</a> library. Just add <code>.datatable</code> class name to any table you
                                wish to conver to a datatable. Check for <a
                                    href="https://fiduswriter.github.io/simple-datatables/demos/" target="_blank">more
                                    examples</a>.</p>

                            <!-- Table with stripped rows -->
                            <table class="table datatable text-center">
                                <thead>
                                    <tr class="text-center">
                                        <th class="text-center">Id</th>
                                        <th class="text-center">
                                            <b>N</b>ame
                                        </th>
                                        <th class="text-center">Season</th>
                                        <th class="text-center">Episode</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @unless (count($pending_seasons) == 0)
                                        @foreach ($pending_seasons as $series)
                                            <tr>
                                                <td>{{ $loop->iteration + ($pending_seasons->currentPage() - 1) * $pending_seasons->perPage() }}
                                                </td>
                                                <td class="text-truncate">{{ $series->full_name }}</td>
                                                <td>{{ $series->season_number }}</td>
                                                <td>{{ $series->episode_number ? $series->episode_number : 'N/A' }}</td>
                                                <td>
                                                    <a href="" class="btn btn-outline-success">Edit <i class="fa fa-edit"
                                                            aria-hidden="true"></i></a>

                                                    <a href="{{ route('approve.series', ['id' => $series->id]) }}"
                                                        class="btn btn-outline-danger">Approve </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endunless
                                </tbody>
                            </table>

                            {{ $pending_seasons->onEachSide(1)->links() }}
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection

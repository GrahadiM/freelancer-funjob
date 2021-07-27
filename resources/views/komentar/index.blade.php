@extends('admin.layouts.index')

@section('judul')
Komentar
@endsection

@section('content')
<section class="section">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">List Komentar</h4>
                    @if (auth()->user()->role_id == 3)
                    <div class="d-flex ">
                        <a href="" class="btn btn-sm btn-outline-primary icon">
                            <i data-feather="plus"></i>
                        </a>
                    </div>
                    @endif
                </div>

                @if (auth()->user()->role_id == 1)
                <div class="card-body px-0 pb-0">
                    <div class="table-responsive">
                        <table class='table mb-0' id="table1">
                            <thead>
                                <tr>
                                    <th>Nama ART</th>
                                    <th>Nama Klien</th>
                                    <th>Nama Jasa</th>
                                    <th>Kategori</th>
                                    <th>Komentar</th>
                                    <th>Bintang</th>
                                    {{-- <th>Tools</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($komentars as $komentar)
                                <tr>
                                    <td>{{ $komentar->jasa->user->name }}</td>
                                    <td>{{ $komentar->user->name }}</td>
                                    <td>{{ $komentar->jasa->name }}</td>
                                    <td>{{ $komentar->jasa->kategori->name }}</td>
                                    <td>{{ $komentar->comment }}</td>
                                    <td style="width: 150px">
                                        @if ($komentar->star == 1)
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        @endif
                                        @if ($komentar->star == 2)
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        @endif
                                        @if ($komentar->star == 3)
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        @endif
                                        @if ($komentar->star == 4)
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        @endif
                                        @if ($komentar->star == 5)
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        @endif
                                    </td>
                                    {{-- <td>
                                            <form action="{{ route('komentar.destroy', $komentar->id) }}" method="post">
                                    <a href="#" class="btn icon btn-outline-primary">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                    @csrf
                                    @method('DELETE')
                                    <button name="save" type="submit" class="btn icon btn-outline-danger">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </button>
                                    </form>
                                    </td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
                @if (auth()->user()->role_id == 2)
                <div class="card-body px-0 pb-0">
                    <div class="table-responsive">
                        <table class='table mb-0' id="table1">
                            <thead>
                                <tr>
                                    <th>Nama Klien</th>
                                    <th>Nama Jasa</th>
                                    <th>Kategori</th>
                                    <th>Komentar</th>
                                    <th>Bintang</th>
                                    {{-- <th>Tools</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($komentars as $komentar)
                                @if ($komentar->jasa->user->id == Auth::user()->id)
                                <tr>
                                    <td>{{ $komentar->user->name }}</td>
                                    <td>{{ $komentar->jasa->name }}</td>
                                    <td>{{ $komentar->jasa->kategori->name }}</td>
                                    <td>{{ $komentar->comment }}</td>
                                    {{-- <td>{{ $komentar->star }}</td> --}}
                                    <td>
                                        @if ($komentar->star == 1)
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        @endif
                                        @if ($komentar->star == 2)
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        @endif
                                        @if ($komentar->star == 3)
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        @endif
                                        @if ($komentar->star == 4)
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        @endif
                                        @if ($komentar->star == 5)
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        @endif
                                    </td>
                                    {{-- <td>
                                            <form action="{{ route('komentar.destroy', $komentar->id) }}" method="post">
                                    <a href="#" class="btn icon btn-outline-primary">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                    @csrf
                                    @method('DELETE')
                                    <button name="save" type="submit" class="btn icon btn-outline-danger">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </button>
                                    </form>
                                    </td> --}}
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif

                <div class="col-12 col-lg-12 mt-3">
                    <nav aria-label="Page navigation example">
                        <ul class="list-inline justify-content-center">
                            <li class="page-item ml-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="">
                                            Halaman : {{ $komentars->currentPage() }}
                                        </p>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="text-center">
                                            Jumlah Data : {{ $komentars->total() }}
                                        </p>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="text-right">
                                            Data Per Halaman : {{ $komentars->perPage() }}
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <ul class="pagination pagination-primary justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="{{ $komentars->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="{{ $komentars->nextPageUrl() }}">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
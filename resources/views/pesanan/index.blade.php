@extends('admin.layouts.index')

@section('judul')
Pesanan
@endsection

@section('content')
<section class="section">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">List Pesanan</h4>
                    @if (auth()->user()->role_id == 3)
                    <div class="d-flex ">
                        <a href="{{ route('pesanan.create') }}" class="btn btn-sm btn-outline-primary icon">
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
                                    <th>Mulai Kontrak</th>
                                    <th>Akhir Kontrak</th>
                                    <th>Harga</th>
                                    <th>Catetan</th>
                                    <th>Tanggal Pesanan</th>
                                    <th>Status</th>
                                    <th>Tools</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesanans as $pesanan)
                                <tr>
                                    <td>{{ $pesanan->jasa->user->name }}</td>
                                    <td>{{ $pesanan->user->name }}</td>
                                    <td>{{ $pesanan->jasa->name }}</td>
                                    <td>{{ $pesanan->jasa->kategori->name }}</td>
                                    <td>{{ $pesanan->start_contract }}</td>
                                    <td>{{ $pesanan->end_contract }}</td>
                                    <td>{{ $pesanan->price }}</td>
                                    <td>{{ $pesanan->note }}</td>
                                    <td>{{ date_format($pesanan->created_at, 'jS M Y') }}</td>
                                    <td>
                                        @if ($pesanan->status == 'Terima')
                                        <span class="badge bg-success">{{ $pesanan->status }}</span>
                                        @endif
                                        @if ($pesanan->status == 'Pending')
                                        <span class="badge bg-danger">{{ $pesanan->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('pesanan.destroy', $pesanan->id) }}" method="post">
                                            <a href="{{ route('pesanan.edit', $pesanan->id) }}" class="btn icon btn-outline-primary">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button name="save" type="submit" class="btn icon btn-outline-danger mt-2">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </td>
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
                                    <th>Mulai Kontrak</th>
                                    <th>Akhir Kontrak</th>
                                    <th>Harga</th>
                                    <th>Catetan</th>
                                    <th>Tanggal Pesanan</th>
                                    <th>Status</th>
                                    <th>Tools</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesanans as $pesanan)
                                @if ($pesanan->jasa->user->id == Auth::user()->id)
                                <tr>
                                    <td>{{ $pesanan->user->name }}</td>
                                    <td>{{ $pesanan->jasa->name }}</td>
                                    <td>{{ $pesanan->jasa->kategori->name }}</td>
                                    <td>{{ $pesanan->start_contract }}</td>
                                    <td>{{ $pesanan->end_contract }}</td>
                                    <td>{{ $pesanan->price }}</td>
                                    <td>{{ $pesanan->note }}</td>
                                    <td>{{ date_format($pesanan->created_at, 'jS M Y') }}</td>
                                    <td>
                                        @if ($pesanan->status == 'Terima')
                                        <span class="badge bg-success">{{ $pesanan->status }}</span>
                                        @endif
                                        @if ($pesanan->status == 'Pending')
                                        <span class="badge bg-danger">{{ $pesanan->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('pesanan.destroy', $pesanan->id) }}" method="post">
                                            <a href="" class="btn icon btn-outline-success">
                                                <i class="fa fa-comments" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ route('pesanan.edit', $pesanan->id) }}" class="btn icon btn-outline-primary">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button name="save" type="submit" class="btn icon btn-outline-danger">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </td>
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
                                            Halaman : {{ $pesanans->currentPage() }}
                                        </p>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="text-center">
                                            Jumlah Data : {{ $pesanans->total() }}
                                        </p>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="text-right">
                                            Data Per Halaman : {{ $pesanans->perPage() }}
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <ul class="pagination pagination-primary justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="{{ $pesanans->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="{{ $pesanans->nextPageUrl() }}">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
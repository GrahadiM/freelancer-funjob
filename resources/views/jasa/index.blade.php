@extends('admin.layouts.index')

@section('judul')
Jasa
@endsection

@section('content')    
    <section class="section">
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">List Jasa</h4>
                        {{-- @if (Auth::user()->role_id == 2) --}}
                        <div class="d-flex ">
                            <a href="{{ route('jasa.create') }}" class="btn btn-sm btn-outline-primary icon">
                                <i data-feather="plus"></i>
                            </a>
                        </div>
                        {{-- @endif --}}
                    </div>

                    @if (Auth::user()->role_id == 1)
                    <div class="card-body px-0 pb-0">
                        <div class="table-responsive">
                            <table class='table mb-0' id="table1">
                                <thead>
                                    <tr>
                                        <th>Nama ART</th>
                                        <th>Nama Jasa</th>
                                        <th>Kategori</th>
                                        <th>Status</th>
                                        <th>Thumbnail</th>
                                        <th>Harga</th>
                                        <th>Keterangan</th>
                                        <th>Tools</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jasas as $jasa)
                                    <tr>
                                        <td>{{ $jasa->user->name }}</td>
                                        <td>{{ $jasa->name }}</td>
                                        <td>{{ $jasa->kategori->name }}</td>
                                        <td>
                                            @if ($jasa->status == 'active')
                                            <span class="badge bg-success">{{ $jasa->status }}</span>
                                            @endif
                                            @if ($jasa->status == 'non-active')
                                            <span class="badge bg-danger">{{ $jasa->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <img src="{{ asset('image/jasa/' . $jasa->image) }}" width="100" alt="thumbnail">
                                        </td>
                                        <td>{{ $jasa->price }}</td>
                                        <td>{{ $jasa->desc }}</td>
                                        <td>
                                            <form action="{{ route('jasa.destroy', $jasa->id) }}" method="post">
                                                <a href="{{ route('jasa.edit', $jasa->id) }}" class="btn icon btn-outline-primary">
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
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif
                    
                    @if (Auth::user()->role_id == 2)
                    <div class="card-body px-0 pb-0">
                        <div class="table-responsive">
                            <table class='table mb-0' id="table1">
                                <thead>
                                    <tr>
                                        <th>Nama Jasa</th>
                                        <th>Kategori</th>
                                        <th>Status</th>
                                        <th>Thumbnail</th>
                                        <th>Harga</th>
                                        <th>Keterangan</th>
                                        <th>Tools</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jasas as $jasa)
                                    @if ($jasa->user->id == Auth::user()->id)
                                    <tr>
                                        <td>{{ $jasa->name }}</td>
                                        <td>{{ $jasa->kategori->name }}</td>
                                        <td>
                                            @if ($jasa->status == 'active')
                                            <span class="badge bg-success">{{ $jasa->status }}</span>
                                            @endif
                                            @if ($jasa->status == 'non-active')
                                            <span class="badge bg-danger">{{ $jasa->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <img src="{{ asset('image/jasa/' . $jasa->image) }}" width="100" alt="thumbnail">
                                        </td>
                                        <td>{{ $jasa->price }}</td>
                                        <td>{{ $jasa->desc }}</td>
                                        <td>
                                            <form action="{{ route('jasa.destroy', $jasa->id) }}" method="post">
                                                <a href="{{ route('jasa.edit', $jasa->id) }}" class="btn icon btn-outline-primary">
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
                                                Halaman : {{ $jasas->currentPage() }}
                                            </p>
                                        </div>
                                        <div class="col-md-4">
                                            {{-- <p class="text-center">
                                                Jumlah Data : {{ $jasas->total() }}
                                            </p> --}}
                                        </div>
                                        <div class="col-md-4">
                                            <p class="text-right">
                                                Data Per Halaman : {{ $jasas->perPage() }}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <ul class="pagination pagination-primary justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" href="{{ $jasas->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="{{ $jasas->nextPageUrl() }}">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
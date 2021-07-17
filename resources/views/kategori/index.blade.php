@extends('admin.layouts.index')

@section('judul')
Kategori
@endsection

@section('content')    
    <section class="section">
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">List Kategori</h4>
                        {{-- <div class="d-flex ">
                            <a href="{{ route('kategori.create') }}" class="btn btn-sm btn-outline-primary icon">
                                <i data-feather="plus"></i>
                            </a>
                        </div> --}}
                    </div>
                    <div class="card-body px-0 pb-0">
                        <div class="table-responsive">
                            <table class='table mb-0' id="table1">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        {{-- <th>Tools</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategoris as $kategori)
                                    <tr>
                                        <td>{{ $kategori->id }}</td>
                                        <td>{{ $kategori->name }}</td>
                                        <td>{{ $kategori->slug }}</td>
                                        {{-- <td>
                                            <form action="" method="post">
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
                    <div class="col-12 col-lg-12 mt-3">
                        <nav aria-label="Page navigation example">
                            <ul class="list-inline justify-content-center">
                                <li class="page-item ml-3">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="">
                                                Halaman : {{ $kategoris->currentPage() }}
                                            </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="text-center">
                                                Jumlah Data : {{ $kategoris->total() }}
                                            </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="text-right">
                                                Data Per Halaman : {{ $kategoris->perPage() }}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <ul class="pagination pagination-primary justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" href="{{ $kategoris->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="{{ $kategoris->nextPageUrl() }}">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
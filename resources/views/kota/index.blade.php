@extends('admin.layouts.index')

@section('judul')
Kota
@endsection

@section('content')    
    <section class="section">
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">List Kota</h4>
                        {{-- <div class="d-flex ">
                            <a href="{{ route('kota.create') }}" class="btn btn-sm btn-outline-primary icon">
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
                                    @foreach ($kotas as $kota)
                                    <tr>
                                        <td>{{ $kota->id }}</td>
                                        <td>{{ $kota->name }}</td>
                                        <td>{{ $kota->slug }}</td>
                                        {{-- <td>
                                            <form action="" method="post">
                                                <a href="{{ route('kota.edit', $kota->id) }}" class="btn icon btn-outline-primary">
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
                </div>
            </div>
        </div>
    </section>
@endsection
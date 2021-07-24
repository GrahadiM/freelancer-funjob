@extends('admin.layouts.index')

@section('judul')
Chatbox Application
@endsection

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">List Inbox</h4>
                        {{-- @if (Auth::user()->role_id == 2) --}}
                        {{-- <div class="d-flex ">
                            <a href="{{ route('pesan.create') }}" class="btn btn-sm btn-outline-primary icon">
                                <i data-feather="plus"></i>
                            </a>
                        </div> --}}
                        {{-- @endif --}}
                    </div>

                    @if (Auth::user()->role_id == 1)
                    <div class="card-body px-0 pb-0">
                        <div class="table-responsive">
                            <table class='table mb-0' id="table1">
                                <thead>
                                    <tr>
                                        <th>Nama Pengirim</th>
                                        <th>Tools</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    @if ($user->role->id == 2)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            {{-- <a href="{{ route('pesan.person', $user->id) }}">Chat</a> --}}
                                            <a href="http://wa.me/{{ $user->phone }}">Chat</a>
                                        </td>
                                    </tr>
                                    @endif
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
                                        <th>Nama Pengirim</th>
                                        <th>Tools</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    @if ($user->role->id == 1)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            <a href="{{ route('pesan.person', $user->id) }}">Chat</a>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">List Inbox</h4>
                        {{-- @if (Auth::user()->role_id == 2) --}}
                        {{-- <div class="d-flex ">
                            <a href="{{ route('pesan.create') }}" class="btn btn-sm btn-outline-primary icon">
                                <i data-feather="plus"></i>
                            </a>
                        </div> --}}
                        {{-- @endif --}}
                    </div>

                    @if (Auth::user()->role_id == 1)
                    <div class="card-body px-0 pb-0">
                        <div class="table-responsive">
                            <table class='table mb-0' id="table1">
                                <thead>
                                    <tr>
                                        <th>Nama Pengirim</th>
                                        <th>Nama Penerima</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pesans as $pesan)
                                    @if ($pesan->to->user->id == Auth::user()->id)
                                    <tr>
                                        <td>{{ $pesan->from->user->name }}</td>
                                        <td>{{ $pesan->to->user->name }}</td>
                                        {{-- <td>
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
                                        </td> --}}
                                    </tr>
                                    @endif
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
                                        <th>Nama Pengirim</th>
                                        <th>Nama Penerima</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pesans as $pesan)
                                    @if ($pesan->to->user->id == Auth::user()->id)
                                    <tr>
                                        <td>{{ $pesan->from->user->name }}</td>
                                        <td>{{ $pesan->to->user->name }}</td>
                                        {{-- <td>
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
                                        </td> --}}
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
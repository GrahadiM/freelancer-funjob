@extends('admin.layouts.index')

@section('judul')
Profile
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Your Profile</h4>
                <p class="card-text"></p>
                <form class="form" method="POST" action="{{ route('profile.update', $user->id) }}">
                @csrf
                @method('PUT')
                    <div class="form-body">
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-left">Nama</label>
                            <div class="col-md-10">
                                <input name="name" id="name" class="form-control" type="text" placeholder="Nama" value="{{ $user->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-md-2 col-form-label text-md-left">Status</label>
                            <div class="col-md-10">
                                <select name="status_id" class="form-control">
                                    <option value="{{ $user->status->id }}" selected>{{ $user->status->name }}</option>
                                    @foreach ($statuses as $status)
                                    <option value="{{ $status->id }}" >{{ $status->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-md-2 col-form-label text-md-left">Nomer Handphone</label>
                            <div class="col-md-10">
                                <input name="phone" type="text" id="phone" class="form-control" placeholder="Nomer Handphone" value="{{ $user->phone }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gender" class="col-md-2 col-form-label text-md-left">Jenis Kelamin</label>
                            <div class="col-md-10">
                                <select name="gender" class="form-control">
                                    <option value="{{ $user->gender }}">{{ $user->gender }}</option>
                                    <option value="pria">pria</option>
                                    <option value="wanita">wanita</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kota_id" class="col-md-2 col-form-label text-md-left">Kota</label>
                            <div class="col-md-10">
                                <select name="kota_id" class="form-control">
                                    <option value="{{ $user->kota->id }}" {{ ($user->kota->id == $user->kota->name) ? "selected" : "" }}>{{ $user->kota->name }}</option>
                                    @foreach ($kotas as $kota)
                                    <option value="{{ $kota->id }}">{{ $kota->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kecamatan_id" class="col-md-2 col-form-label text-md-left">Kecamatan</label>
                            <div class="col-md-10">
                                <select name="kecamatan_id" class="form-control">
                                    <option value="{{ $user->kecamatan->id}}" {{ ($user->kecamatan->id == $user->kecamatan->name) ? "selected" : "" }}>{{ $user->kecamatan->name }}</option>
                                    @foreach ($kecamatans as $kecamatan)
                                    <option value="{{ $kecamatan->id }}">{{ $kecamatan->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label for="role" class="col-md-2 col-form-label text-md-left">Role</label>
                            <div class="col-md-10">
                                <select name="role_id" class="form-control">
                                    <option value="{{ $user->role->name }}" selected>{{ $user->role->name }}</option>
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->name }}" >{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}
                        {{-- <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-left">Email</label>
                            <div class="col-md-10">
                                <input name="email" type="email" id="email" class="form-control" placeholder="Email" value="{{ $user->email }}">
                            </div>
                        </div> --}}
                        {{-- <div class="form-group row">
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-left">{{ __('Confirm Password') }}</label>

                            <div class="col-md-10">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div> --}}
                    </div>
                    <div class="form-actions d-flex justify-content-end">
                        <button value="save" type="submit" class="btn btn-primary mr-1">Submit</button>
                        <button type="reset" class="btn btn-light-primary">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
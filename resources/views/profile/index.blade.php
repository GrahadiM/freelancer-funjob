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
                <form class="form" method="POST" action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="form-body">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group row">
                                    <label for="name" class="col-md-2 col-form-label text-md-left">Nama</label>
                                    <div class="col-md-10">
                                        <input name="name" id="name" class="form-control" type="text" placeholder="Nama" value="{{ $user->name }}">
                                        <p class="text-danger">{{ $errors->first("name") }}</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-md-2 col-form-label text-md-left">Email</label>
                                    <div class="col-md-10">
                                        <input name="email" id="email" type="email" class="form-control" placeholder="Email"  value="{{ $user->email }}">
                                        <p class="text-danger">{{ $errors->first("email") }}</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-md-2 col-form-label text-md-left">Password</label>
                                    <div class="col-md-10">
                                        <input value="{{ $user->password }}" name="password" id="password" type="password" class="form-control" placeholder="Masukkan password">
                                        <p class="text-danger">{{ $errors->first("password") }}</p>
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
                                        <p class="text-danger">{{ $errors->first("status") }}</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-md-2 col-form-label text-md-left">Nomer Handphone</label>
                                    <div class="col-md-10">
                                        <input name="phone" type="text" id="phone" class="form-control" placeholder="Nomer Handphone" value="{{ $user->phone }}">
                                        <p class="text-danger">{{ $errors->first("phone") }}</p>
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
                                        <p class="text-danger">{{ $errors->first("gender") }}</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kota_id" class="col-md-2 col-form-label text-md-left">Kota</label>
                                    <div class="col-md-10">
                                        <select name="kota_id" class="form-control">
                                            @if ($user->kota_id == null)
                                            @else
                                            <option value="{{ Auth::user()->kota->id }}" {{ (Auth::user()->kota->id == Auth::user()->kota->name) ? "selected" : "" }}>{{ Auth::user()->kota->name }}</option>
                                            @endif
                                            @foreach ($kotas as $kota)
                                            <option value="{{ $kota->id }}">{{ $kota->name }}</option>
                                            @endforeach
                                        </select>
                                        <p class="text-danger">{{ $errors->first("kota_id") }}</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kecamatan_id" class="col-md-2 col-form-label text-md-left">Kecamatan</label>
                                    <div class="col-md-10">
                                        <select name="kecamatan_id" class="form-control">
                                            @if ($user->kecamatan_id == null)
                                            @else
                                            <option value="{{ Auth::user()->kecamatan->id}}" {{ (Auth::user()->kecamatan->id == Auth::user()->kecamatan->name) ? "selected" : "" }}>{{ Auth::user()->kecamatan->name }}</option>
                                            @endif
                                            @foreach ($kecamatans as $kecamatan)
                                            <option value="{{ $kecamatan->id }}">{{ $kecamatan->name }}</option>
                                            @endforeach
                                        </select>
                                        <p class="text-danger">{{ $errors->first("kecamatan_id") }}</p>
                                    </div>
                                </div>
                                {{-- <div class="form-group row">
                                    <label for="password-confirm" class="col-md-2 col-form-label text-md-left">{{ __('Confirm Password') }}</label>
        
                                    <div class="col-md-10">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                    </div>
                                </div> --}}
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    {{-- <div class="form-file">
                                        <input name="image" type="file" class="form-file-input" id="image">
                                        <label class="form-file-label" for="image">
                                            <span class="form-file-text">Choose file...</span>
                                            <span class="form-file-button">Browse</span>
                                        </label>
                                    </div> --}}
                                    <label for="image">Masukkan Foto Profile</label>
                                    <input name="image" type="file" class="form-control-file" id="image">
                                    <img alt="image" src="{{ asset('image/profile/' . $user->image) }}" class="img-fluid" style="width: 200px; margin-top: 1rem;">
                                    <p class="text-danger">{{ $errors->first("image") }}</p>
                                </div>
                            </div>
                        </div>
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
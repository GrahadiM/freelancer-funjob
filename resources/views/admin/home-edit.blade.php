@extends('admin.layouts.index')

@section('title', 'Update Role & Status')

@section('content')
<div class="clearfix"></div>
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="row mt-3">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <div class="card-title">Form Role & Status</div>
            <hr>
            <form action="{{ route('home.update', $user->id ) }}" method="POST">
            @csrf
            @method('PUT')
              <div class="form-group">
                <label for="name">Name</label>
                <input disabled type="text" name="name" class="form-control form-control-rounded" id="name" value="{{ $user->name }}">
              </div>
              <div class="form-group">
                <label for="role_id">Role</label>
                <select name="role_id" id="role-option" class="form-control form-control-rounded">
                  <option value="{{ $user->role->id }}">{{ $user->role->name }}</option>
                  @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                  @endforeach
                </select>
                {{-- <input type="text" name="role_id" class="form-control form-control-rounded" id="status_id" value="{{ $user->role->name }}"> --}}
              </div>
              <div class="form-group">
                <label for="status_id">Status</label>
                <select name="status_id" id="status-option" class="form-control form-control-rounded">
                  <option value="{{ $user->status->id }}">{{ $user->status->name }}</option>
                  @foreach ($statuses as $status)
                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                  @endforeach
                </select>
                {{-- <input type="text" name="status_id" class="form-control form-control-rounded" id="status_id" value="{{ $user->status->name }}"> --}}
              </div>
              <div class="form-group">
                <a href="{{ route('home') }}" class="btn btn-danger btn-round px-5">Cancel</a>
                <button type="submit" value="save" class="btn btn-primary btn-round px-5">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div><!--End col-lg-6-->
    </div><!--End Row-->
  </div><!--End Container-->
</div><!--End Content-->
@endsection
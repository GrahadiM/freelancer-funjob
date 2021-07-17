@extends('admin.layouts.index')

@section('title', 'Update Pesanan')

@section('content')
<div class="clearfix"></div>
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="row mt-3">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <div class="card-title">Update Status Pesanan</div>
            <hr>
            <form action="{{ route('pesanan.update', $pesanan->id) }}" method="POST">
            @csrf
            @method('PUT')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status-option" class="form-control form-control-rounded">
                                <option value="Terima">Terima</option>
                                <option value="Pending">Pending</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <a href="{{ route('pesanan.index') }}" class="btn btn-danger btn-round mr-3 px-5">Cancel</a>
                    <button type="submit" class="btn btn-primary btn-round px-5">Update</button>
                </div>
            </form>
          </div>
        </div>
      </div>
      <!--End col-lg-6-->
    </div>
    <!--End Row-->
  </div>
  <!--End Container-->
</div>
<!--End Content-->
@endsection
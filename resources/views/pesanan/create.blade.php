@extends('admin.layouts.index')

@section('title', 'Create Pesanan')

@section('app.js')
{{-- Mask --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
    //   $('.date').mask('00/00/0000');
      $('.date').mask('0000-00-00');
      $('.time').mask('00:00');
      $('.date_time').mask('00/00/0000 00:00:00');
      $('.phone').mask('0000-0000-0000');
      $('.money').mask('000.000.000.000.000,00', {reverse: true})
    });
</script>
@endsection

@section('content')
<div class="clearfix"></div>
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="row mt-3">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <div class="card-title">Form Pesanan</div>
            <hr>
            <form action="{{ route('pesanan.store') }}" method="POST">
            {{ method_field('post') }}
            @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="user_id">User</label>
                            <select name="user_id" id="user-option" class="form-control form-control-rounded">
                            @foreach ($users as $user)
                            @if ($user->id == auth()->user()->id)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endif
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jasa_id">Jasa</label>
                            <select name="jasa_id" id="jasa-option" class="form-control form-control-rounded">
                            @foreach ($jasas as $jasa)
                            @if ($jasa->status == "active")
                            <option value="{{ $jasa->id }}">{{ $jasa->name }}</option>
                            @endif
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="start_contract">Mulai Kontrak</label>
                            <input type="text" name="start_contract" class="form-control form-control-rounded date" id="start_contract">
                        </div>
                        <div class="form-group">
                            <label for="end_contract">Akhir Kontrak</label>
                            <input type="text" name="end_contract" class="form-control form-control-rounded date" id="end_contract">
                        </div>
                        <div class="form-group">
                            <label for="price">Harga</label>
                            <input type="text" name="price" class="form-control form-control-rounded money" id="price">
                        </div>
                        <div class="form-group">
                            <label for="note">Catatan</label>
                            <input type="text" name="note" class="form-control form-control-rounded" id="note">
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <a href="{{ route('pesanan.index') }}" class="btn btn-danger btn-round mr-3 px-5">Cancel</a>
                    <button type="submit" class="btn btn-primary btn-round px-5">Create</button>
                </div>
            </form>
          </div>
        </div>
      </div><!--End col-lg-6-->
    </div><!--End Row-->
  </div><!--End Container-->
</div><!--End Content-->
@endsection
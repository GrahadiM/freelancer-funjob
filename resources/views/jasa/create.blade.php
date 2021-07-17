@extends('admin.layouts.index')

@section('title', 'Create Jasa')

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
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="card-title">Form Jasa</div>
            <hr>
            <form action="{{ route('jasa.store') }}" method="POST">
            @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name">Nama Jasa</label>
                            <input type="text" name="name" class="form-control form-control-rounded" id="name">
                        </div>
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
                            <label for="kategori_id">Kategori</label>
                            <select name="kategori_id" id="kategori-option" class="form-control form-control-rounded">
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price">Harga</label>
                            <input type="text" name="price" class="form-control form-control-rounded money" id="price">
                        </div>
                        <div class="form-group">
                            <label for="desc">Deskripsi</label>
                            <input name="desc" class="form-control form-control-rounded" id="desc">
                        </div>
                    </div>
                    {{-- <div class="col-lg-6">
                      <div class="form-group">
                        <label for="image">Gambar</label>
                        <div class="form-file">
                            <input name="image" type="file" class="form-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            <label class="form-file-label" for="inputGroupFile01">
                                <span class="form-file-text">Choose file...</span>
                                <span class="form-file-button">Browse</span>
                            </label>
                        </div>
                      </div>
                    </div> --}}
                </div>
                <div class="form-group d-flex justify-content-center mt-3">
                    <a href="{{ route('jasa.index') }}" class="btn btn-danger btn-round mr-3 px-5">Cancel</a>
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
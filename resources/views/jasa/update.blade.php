@extends('admin.layouts.index')

@section('title', 'Update Jasa')

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
{{-- Image --}}
<script>
    $('#btn-change-image').on('click', () => { $('#image-file').trigger('click'); });
    $('#image-file').on('change', (e) => {
        let input = e.input;
        let path = $(e.targe).val();
        var ext = path.substring(path.lastIndexOf('.') + 1).toLowCase();
        if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == jpeg || ext == jpg))
        {
            var reader = new FileReader();
            reader.onload = function (res) {$('#img-preview').attr('src', res.target.result); };
            reader.readeAsDataUrl(input.files[0]);
        }
    })
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
            <div class="card-title">Update Jasa</div>
            <hr>
            <form action="{{ route('jasa.update', $jasa->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" class="form-control form-control-rounded" id="name" value="{{ $jasa->name }}">
                        </div>
                        <div class="form-group">
                            <label for="price">Harga</label>
                            <input type="text" name="price" class="form-control form-control-rounded money" id="price" value="{{ $jasa->price }}">
                        </div>
                        <div class="form-group">
                            <label for="desc">Deskripsi</label>
                            <textarea name="desc" class="form-control form-control-rounded" id="desc" rows="3">{{ $jasa->desc }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status-option" class="form-control form-control-rounded">
                                <option value="{{ $jasa->status }}">{{ $jasa->status }}</option>
                                <option value="active">Active</option>
                                <option value="non-active">Non-Active</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                    </div>
                </div>
                <div class="form-group d-flex justify-content-center mt-3">
                    <a href="{{ route('jasa.index') }}" class="btn btn-danger btn-round mr-3 px-5">Cancel</a>
                    <button type="submit" name="save" class="btn btn-primary btn-round px-5">Update</button>
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
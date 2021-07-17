@extends('admin.layouts.index')

@section('judul')
Chatbox Application
@endsection

@section('content')
<section class="section">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="media d-flex align-items-center">
                        <div class="avatar mr-3">
                            <img src="{{ asset('image/profile') }}/{{ Auth::user()->image }}" alt="" srcset="">
                            <span class="avatar-status bg-success"></span>
                        </div>
                        <div class="name flex-grow-1">
                            <h6 class="mb-0">{{ $pesan->to->user->name }}</h6>
                            <span class="text-xs">Online</span>
                        </div>
                        <a href="{{ route('pesan.index') }}" class="btn btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </a>
                    </div>
                </div>
                <div class="card-body pt-4 bg-grey">
                    <div class="chat-content">
                        <div class="chat">
                            <div class="chat-body">
                                <div class="chat-message">Hi Alfy, how can i help you?</div>
                            </div>
                        </div>
                        <div class="chat chat-left">
                            <div class="chat-body">
                                <div class="chat-message">I'm looking for the best admin dashboard template</div>
                                <div class="chat-message">With bootstrap certainly</div>
                            </div>
                        </div>
                        <div class="chat">
                            <div class="chat-body">
                                <div class="chat-message">I recommend you to use Voler Dashboard</div>
                            </div>
                        </div>
                        <div class="chat chat-left">
                            <div class="chat-body">
                                <div class="chat-message">That's great! I like it so much :)</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <form action="#" method="POST">
                        @csrf
                        <div class="message-form d-flex flex-direction-column align-items-center">
                            <div class="d-flex flex-grow-1 mr-4">
                                <input name="message" type="text" class="form-control" placeholder="Type your message..">
                            </div>
                            <button type="submit" class="btn btn-sm btn-secondary black">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
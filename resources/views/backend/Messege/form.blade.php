use App\Models\Role;
@extends('layouts.backend.app')

@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endpush

@section('content')

<div class="container-fluid px-4">
    <div class="card mb-2">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Messege
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('app.messeges.store') }}">
                @csrf
                <div class="form-group">
                    <div class="form-floating mb-3">
                        <input type="text" id="message" class="form-control @error('message') is-invalid @enderror" id="floatingInput" name="message" placeholder="SAGOR"  required>
                        <label for="floatingInput">Write Your Text...</label>
                    </div>
                    @error('message')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-outline-secondary" name="user" value="{{ $user }}">
                        <i class="align-middle me-2" data-feather="plus-circle"></i> Submit
                </button>
                
            </form>
        </div>
    </div>
    <br>
    <div class="card-body">

        @foreach($notifications as $notification)
            @if($user == $notification->data['sender_id'])
                <div class="card mb-2">
                    <div class="card-body">
                        <div class=" {{ $notification->read_at == Null ? 'text-danger' : '' }}">
                            <div>
                                
                                <h1 style="font-size:1.5vw;">{{ $notification->data['guest_name'] }}</h1>

                            </div>
                            <a href="{{ route('app.marsAsRead', $user) }}" class=" {{ $notification->read_at == Null ? 'text-danger' : 'text-body' }}">
                                
                                <p >{{ $notification->data['messege'] }}</p>
                            </a>
                            <small>{{ $notification->created_at->format('d-M-Y  g:i A') }}</small>
                        </div>
                        
                    </div>
                </div>
            @endif
        @endforeach    
    </div>
</div>

@endsection


@push('js')

@endpush
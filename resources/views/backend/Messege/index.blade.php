use App\Models\Role;
@extends('layouts.backend.app')

@push('css')

@endpush

@section('content')

<div class="container-fluid px-4">
    <div class="card mb-2">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Messeges
        </div>
        <div class="card-body">
            
            @foreach($notifications as $notification)
            <div class="card mb-2">
                <div class="card-body">
                    <span style="float:left">
                        <a class="" href="{{ route('app.messeges.show', $notification->data['sender_id']) }}">
                            <p class="{{ $notification->read_at == Null ? 'text-danger' : 'text-body' }}"><strong>{{ $notification->data['guest_name'] }}</strong> Sent you a new Text</p>
                        </a>
                        
                    </span>
                    
                    <span style="float:right">
                    <p class="{{ $notification->read_at == Null ? 'text-danger' : '' }}">{{ $notification->created_at->format('d-M-Y g:i A') }}</p>
                    </span>
                </div>
            </div>
            @endforeach

            
        </div>

        
    </div>
</div>

@endsection


@push('js')


@endpush
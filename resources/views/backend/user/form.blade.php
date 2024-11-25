@extends('layouts.backend.app')

@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endpush

@section('content')

<div class="container-fluid px-4">
    <br><br>
    <div class="card mb-2">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            {{ isset($user) ? 'Edit': 'Create' }} User
        </div>
        <div class="card-body">
            <form method="POST" action="{{ isset($user) ? route('app.users.update', $user->id) : route('app.users.store') }}">
                @csrf
                @isset($user)
                    @method('PUT')
                @endisset
                <div class="form-group">
                    <div class="form-floating mb-3">
                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" id="floatingInput" name="name" placeholder="SAGOR" value="{{ $user->name ?? old('name') }}" {{ !isset($user) ? 'required' : ''}} >
                        <label for="floatingInput">User Name </label>
                    </div>
                    @error('name')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="form-floating mb-3">
                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" name="email" placeholder="SAGOR" value="{{ $user->email ?? old('email') }}" {{ !isset($user) ? 'required' : ''}} >
                        <label for="floatingInput">Email</label>
                    </div>
                    @error('email')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="floatingInput">Select Role</label>
                    
                    <div class="form-floating mb-3">
                        <select  id="role" class="js-example-basic-single form-select @error('role') is-invalid @enderror" id="floatingInput" name="role" aria-label="Default select example" >
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" @isset($user){{ $user->role->id == $role->id ? 'selected' : '' }} @endisset>{{ $role->name }}</option>
                            @endforeach
                        </select>
                        
                    </div>
                    @error('role')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="form-floating mb-3">
                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" id="floatingInput" name="password" placeholder="SAGOR"  {{ !isset($user) ? 'required' : ''}} >
                        <label for="floatingInput">Password  </label>
                    </div>
                    @error('password')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="form-floating mb-3">
                        <input type="password" id="confirm_password" class="form-control @error('password') is-invalid @enderror" id="floatingInput" name="password_confirmation" placeholder="SAGOR"  {{ !isset($user) ? 'required' : ''}} >
                        <label for="floatingInput">Confirm Password</label>
                    </div>
                    @error('password_confirmation')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                

                <button type="submit" class="btn btn-outline-secondary">
                    @isset($user)
                        <i class="align-middle me-2" data-feather="plus-circle"></i> Update
                    @else
                        <i class="align-middle me-2" data-feather="plus-circle"></i> Create
                    @endisset
                
                </button>
            </form>
        </div>
    </div>
</div>

@endsection


@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>


@endpush
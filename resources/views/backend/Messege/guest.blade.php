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
            Guest Information
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('app.messege') }}">
                @csrf
                <div class="form-group">
                    <div class="form-floating mb-3">
                        <input type="text" id="guestName" class="form-control @error('guestName') is-invalid @enderror" id="floatingInput" name="guestName" placeholder="SAGOR" value="{{ Auth::user()->name}}"  required>
                        <label for="floatingInput">Guest Name:</label>
                    </div>
                    @error('name')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="form-floating mb-3">
                        <input type="text" id="mobile" class="form-control @error('mobile') is-invalid @enderror" id="floatingInput" name="mobile" placeholder="SAGOR"  required>
                        <label for="floatingInput">Mobile No: </label>
                    </div>
                    @error('mobile')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="form-floating mb-3">
                        <textarea  type="text" id="floatingTextarea2" style="height: 100px"class="form-control @error('guestName') is-invalid @enderror" id="floatingInput" name="guestAddress" placeholder="SAGOR" rows="3" required></textarea>
                        <label for="floatingInput">Guest Organization Name & Address: </label>
                    </div>
                    
                    @error('name')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="floatingInput">No Of Persons:</label>
                    
                    <div class="form-floating mb-3">
                        <select  id="nop" class="form-select @error('nop') is-invalid @enderror" id="floatingInput" name="nop" aria-label="Default select example" >
                            <option value="1" >1</option>
                            <option value="2" >2</option>
                            <option value="3" >3</option>
                            <option value="4" >4</option>
                            <option value="5" >5</option>
                            <option value="6" >6</option>
                            <option value="7" >7</option>
                            <option value="8" >8</option>
                            <option value="9" >9</option>
                        </select>
                        
                    </div>
                    @error('nop')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="form-floating mb-3">
                        <textarea  type="text" id="floatingTextarea2" style="height: 100px"class="form-control @error('purpose') is-invalid @enderror" id="floatingInput" name="purpose" placeholder="SAGOR" rows="3" required></textarea>
                        <label for="floatingInput">Purpose: </label>
                    </div>
                    
                    @error('purpose')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="floatingInput">Select Receiver:</label>
                    
                    <div class="form-floating mb-3">
                        <select  id="role" class="js-example-basic-single form-select @error('role') is-invalid @enderror" id="floatingInput" name="receiver" aria-label="Default select example" >
                            <option selected>Open this select menu</option>
                            @foreach($roles as $role)
                                @if($role->name != "Admin" && $role->name != "User")
                                    <optgroup label="{{ $role->name }}">
                                    @foreach($users as $user)
                                        @if($role->id == $user->role_id)
                                            <option value="{{ $user->id }}" >{{ $user->name }}</option>
                                        @endif
                                    @endforeach
                                    </optgroup>
                                @endif
                            @endforeach
                        </select>
                        
                        
                    </div>
                    @error('role')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                

                <button type="submit" class="btn btn-outline-secondary">
                        <i class="align-middle me-2" data-feather="plus-circle"></i> Submit
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
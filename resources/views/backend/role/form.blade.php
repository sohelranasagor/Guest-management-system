@extends('layouts.backend.app')

@push('css')

@endpush

@section('content')

<div class="container-fluid px-4">
    <br><br>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            {{ isset($role) ? 'Edit': 'Create' }} Roles
        </div>
        <div class="card-body">
            <form method="POST" action="{{ isset($role) ? route('app.roles.update', $role->id) : route('app.roles.store') }}">
                @csrf
                @isset($role)
                    @method('PUT')
                @endisset
                <div class="form-group">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="floatingInput" name="name" placeholder="SAGOR" value="{{ $role->name ?? old('name') }}" autofocus>
                        <label for="floatingInput">Role Name</label>
                    </div>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="text-center">
                    <br><strong>Manage Permissions For Role</strong>
                    <p class="p-2">
                        @error('permissions')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </p>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="selectAll" name="foo">
                        <label class="custom-control-label" for="select-all">Select all</label>
                    </div>
                </div>
                
                @forelse ($modules->chunk(2) as $key=>$chunks)
                    <div class="row">
                        @foreach($chunks as $key=>$module)
                            <div class="col">
                                <h5>Module: {{ $module->name }}</h5>
                                @foreach($module->permissions as $key=>$permission)
                                    <div class="mb-3 ml-4">
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="Checkbox" class="custom-control-input" id="permission-{{ $permission->id }}"
                                                name="permissions[]" value="{{ $permission->id }}"
                                                @isset($role)
                                                    @foreach($role->permissions as $rPermission)
                                                        {{ $permission->id == $rPermission->id ? 'checked' : '' }}
                                                    @endforeach                                                        
                                                @endisset
                                                >
                                            
                                            <label for="permission-{{ $permission->id }}" class="custom-control-label"> {{ $permission->name  }} </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                    
                @empty
                    <div class="row">
                        <div class="col text-center">
                            <strong>No Module Found</strong>

                        </div>
                    </div>
                    
                @endforelse

                <button type="submit" class="btn btn-primary">
                    @isset($role)
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
<script src="/js/checkbox.js"></script>



@endpush
@extends('layouts.backend.app')

@push('css')

@endpush

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Role Management</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Roles</li>
    </ol>
    <div class="page-title-actions" style="display: flex; justify-content: flex-end">
        <div class="d-inline-block dropdown">
            @foreach(Auth::user()->role->permissions as $permission)
            <a href="{{ route('app.roles.create') }}" class="btn-shadow btn btn-info align-right"
            style="{{ $permission->name != "Create Role" ? 'display:none' : '' }}">
                <span class="btn-icon-wrapper pr-2 opacity-7">
                    <i class="fas fa-plus-circle fa-w-20"></i>
                </span>
                
                {{ __('Create Role') }}
            </a>
            @endforeach
        </div>
    </div>
    <br>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Roles
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Permissions</th>
                        <th class="text-center">Updated At</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $key=>$role)
                    <tr>
                        <td class="text-center">{{ $key +1 }}</td>
                        <td class="text-center">{{ $role->name }}</td>
                        <td class="text-center">
                            @if ($role->permissions->count() > 0)
                                <span class="badge bg-info"> {{ $role->permissions->count() }} </span>
                            @else
                                <span class="badge bg-warning">No Permission Found</span>
                            @endif
                        </td>
                        <td class="text-center">{{ $role->updated_at->diffForHumans() }}</td>
                        <td class="text-center">
                            <a href="{{ route('app.roles.edit',$role->id) }}" class="btn btn-outline-success">
                                <i class="fas fa-edit" data-feather="edit"></i>Permission
                            </a>
                            @if($role->deletable == true)
                                <button type="button" class="btn btn-outline-danger" onclick="eraseData({{ $role->id }})">
                                    <i class="fas fa-trash-alt" data-feather="trash-2"></i>Delete
                                </button>
                                <form id="delete-form-{{ $role->id }}" method="POST" action="{{ route('app.roles.destroy', $role->id) }}" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection


@push('js')
<script src="/js/checked.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="/js/eraseData.js"></script>

@endpush
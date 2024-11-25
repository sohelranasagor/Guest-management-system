@extends('layouts.backend.app')

@push('css')

@endpush

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">User Management</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Users</li>
    </ol>

    <div class="page-title-actions" style="display: flex; justify-content: flex-end">
        <div class="d-inline-block dropdown">
            @foreach(Auth::user()->role->permissions as $permission)
            <a href="{{ route('app.users.create') }}" class="btn-shadow btn btn-info align-right"
            style="{{ $permission->name != "Create User" ? 'display:none' : '' }}">
                <span class="btn-icon-wrapper pr-2 opacity-7">
                    <i class="fas fa-plus-circle fa-w-20"></i>
                </span>
                {{ __('Create User') }}
            </a>
            @endforeach
        </div>
    </div>
    <br>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Users
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Role</th>
                        <th class="text-center">Joined At</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key=>$user)
                    <tr>
                        <td class="text-center">{{ $key +1 }}</td>
                        <td class="text-center">{{ $user->name }}</td>
                        <td class="text-center">{{ $user->email }}</td>
                        @if($user->role)
                            <td class="text-center">{{ $user->role->name }}</td>
                        @endif
                        <td class="text-center">{{ $user->created_at->diffForHumans() }}</td>
                        <td class="text-center">
                            <a href="{{ route('app.users.edit',$user->id) }}" class="btn btn-outline-success">
                                <i class="fas fa-edit" data-feather="edit"></i>Edit
                            </a>
                            <button type="button" class="btn btn-outline-danger" onclick="eraseData({{ $user->id }})">
                                <i class="fas fa-trash-alt" data-feather="trash-2"></i>Delete
                            </button>
                            <form id="delete-form-{{ $user->id }}" method="POST" action="{{ route('app.users.destroy', $user->id) }}" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>

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
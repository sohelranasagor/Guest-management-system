@extends('layouts.backend.app')

@push('css')

@endpush

@section('content')

<div class="container-fluid px-4">
    <br><br>
    <br>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Permissions
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Permission Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $key=>$permission)
                    <tr>
                        <td class="text-center">{{ $key +1 }}</td>
                        <td class="text-center">{{ $permission->name }}</td>
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
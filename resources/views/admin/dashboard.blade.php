@extends('layouts.backend.app')


@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">{{ Auth::user()->role->slug }} Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-user-alt me-2"></i>
            Personal Information
        </div>
        <div class="card-body">
            <div class="container">
                <br><br>
                <div class="row">
                  <div class="col">
                    <p class="fs-3">Name:</p>
                  </div>
                  <div class="col">
                    <p class="fs-3">{{ Auth::user()->name }}</p>
                  </div>
                  <div class="col">
                  </div>
                  <div class="col">
                  </div>
                  <div class="col">
                  </div>
                  <div class="col">
                  </div>
                </div>
                <div class="row">
                    <div class="col">
                      <p class="fs-3">Email:</p>
                    </div>
                    <div class="col">
                      <p class="fs-3">{{ Auth::user()->email }}</p>
                    </div>
                    <div class="col">
                    </div>
                    <div class="col">
                    </div>
                    <div class="col">
                    </div>
                    <div class="col">
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
@extends('layouts.sleek.main')
@section('activeapps', 'active')
@section('expandapps', 'expand')
@section('showapps', 'show')
@section('addapps', 'active')

@section('content')
    <div class="breadcrumb-wrapper">
        <h1>Application Management</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-0">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}"><span class="mdi mdi-home"></span></a>
                </li>
                <li class="breadcrumb-item">application</li>
                <li class="breadcrumb-item" aria-current="page">add application</li>
            </ol>
        </nav>
    </div> 

    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom d-flex justify-content-between">
                    <h2>Add new application.</h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 form-group">
                            <label>Application Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter application name" required>
                        </div>
                        <div class="mb-3 form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Enter application description"></textarea>
                        </div>
                        <div class="mb-3 form-group">
                            <label>URL</label>
                            <input type="text" class="form-control" name="url" placeholder="Enter application URL" required>
                        </div>
                        <div class="mb-3 form-group">
                            <label>Developer's Name</label>
                            <input type="text" class="form-control" name="developer_name" placeholder="Enter developer's name" required>
                        </div>
                        <div class="mb-3 form-group">
                            <label>Application Image/Logo</label>
                            <input type="file" class="form-control-file" name="image">
                        </div>

                        <button type="submit" class="btn btn-primary">Save User</button>
                        <a href="{{ route('apps.index') }}" class="btn btn-default">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
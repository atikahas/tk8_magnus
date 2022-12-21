@extends('layouts.sleek.main')
@section('activeapps', 'active')
@section('expandapps', 'expand')
@section('showapps', 'show')
@section('listapps', 'active')

@section('scriptheader')
    <link href="{{url('')}}/sleek/source/assets/plugins/data-tables/datatables.bootstrap4.min.css" rel="stylesheet">
    <link href="{{url('')}}/sleek/source/assets/plugins/data-tables/responsive.datatables.min.css" rel="stylesheet">
    <link href="https://unpkg.com/sleek-dashboard/dist/assets/css/sleek.min.css">

    <style>
        .card__exit {
  grid-row: 1/2;
  justify-self: end;
}
    </style>
@endsection


@section('content')
    <div class="breadcrumb-wrapper">
        <h1>Applications</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-0">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}"><span class="mdi mdi-home"></span></a>
                </li>
                <li class="breadcrumb-item">applications</li>
                <li class="breadcrumb-item" aria-current="page">list applications</li>
            </ol>
        </nav>
    </div> 


    <div class="col-12">
        <ul class="nav float-right  nav-style-border" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="mb-1 btn btn-sm btn-outline-primary active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true"><i class="mdi mdi-view-grid"></i></a>
            </li>
            <li class="nav-item">
                <a class="mb-1 btn btn-sm btn-outline-primary" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false"><i class="mdi mdi-view-list"></i></a>
            </li>
        </ul>
        <br>
  
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="tab-widget mt-5">
                    <div class="row">
                        @foreach($app as $a)
                        <div class="col-md-6 col-xl-3">
                            <div class="card mb-4">
                                <img class="card-img-top" src="{{url('storage/apps_image/'.$a->image)}}">
                                <div class="card-body" style="padding:10px; height:80px">
                                    <div class="dropdown float-right">
                                        <button class="float-right " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                            <i class="mdi mdi-drag-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ $a->url }}" target=_blank>View</a>
                                            <a class="dropdown-item" href="{{ route('apps.edit', $a->id) }}">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                    <h5 class="card-title text-primary" style="margin:0px"><a href="{{ $a->url }}" target=_blank>{{ $a->name }}</a></h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
  
            <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                <div class="tab-pane-content mt-5">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                        <table id="app-table" class="table dt-responsive table-hover nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Applications Name</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($app as $a)
                                    <tr>
                                        <td width="1%">#</td>
                                        <td width="89%"><a href="{{ $a->url }}" target=_blank>{{ $a->name }}</a></td>
                                        <td width="10%">
                                            <a class="btn btn-sm btn-primary" href="{{ $a->url }}" target=_blank><i class="mdi mdi-eye"></i></a>
                                            <a class="btn btn-sm btn-secondary" href="{{ route('apps.edit', $a->id) }}"><i class="mdi mdi-square-edit-outline"></i></a>
                                            <a class="btn btn-sm btn-danger" href="#"><i class="mdi mdi-trash-can-outline"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scriptfooter')
    <script>
        jQuery(document).ready(function() {
            jQuery('#app-table').DataTable();
        });
    </script>
    <script src="{{url('')}}/sleek/source/assets/plugins/data-tables/jquery.datatables.min.js"></script>
    <script src="{{url('')}}/sleek/source/assets/plugins/data-tables/datatables.bootstrap4.min.js"></script>
    <script src="{{url('')}}/sleek/source/assets/plugins/data-tables/datatables.responsive.min.js"></script>
@endsection


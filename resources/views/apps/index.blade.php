@extends('layouts.sleek.main')
@section('activeapps', 'active')
@section('expandapps', 'expand')
@section('showapps', 'show')
@section('listapps', 'active')

@section('scriptheader')
    <link href="{{url('')}}/sleek/source/assets/plugins/data-tables/datatables.bootstrap4.min.css" rel="stylesheet">
    <link href="{{url('')}}/sleek/source/assets/plugins/data-tables/responsive.datatables.min.css" rel="stylesheet">
    <link href="https://unpkg.com/sleek-dashboard/dist/assets/css/sleek.min.css">
@endsection


@section('content')
    <div class="breadcrumb-wrapper">
        <h1>Applications</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-0">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}"><span class="mdi mdi-home"></span></a>
                </li>
                <li class="breadcrumb-item">users</li>
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
  
        <div class="tab-content px-3 px-xl-5" id="myTabContent">
            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="tab-widget mt-5">
                    <div class="row">
                        @foreach($app as $a)
                        <div class="col-md-6 col-xl-3">
                            <div class="card mb-4">
                                <img class="card-img-top" src="https://reactnativecode.com/wp-content/uploads/2018/02/Default_Image_Thumbnail.png">
        
                                <div class="card-body" style="padding:10px; height:80px">
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
                                @foreach($app as $a)
                                <li class="list-group-item text-dark"><a href="{{ $a->url }}" target=_blank>{{ $a->name }}</a></li>
                                @endforeach
                            </div>
                        </div>

                        <table id="app-table" class="table dt-responsive table-hover nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th width="1%">#</th>
                                    <th>Apps Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($app as $a)
                                    <tr>
                                        <td>#</td>
                                        <td><a href="{{ $a->url }}" target=_blank>{{ $a->name }}</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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


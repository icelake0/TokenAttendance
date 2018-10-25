@extends('layouts.app')

@section('content')
<?php $page_title='Dashboard'; ?>
<!-- .row -->
<div class="row">
            <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="white-box">
                    <h3 class="box-title">CHILDREN</h3>
                    <ul class="list-inline two-part">
                        <li><i class="icon-people text-info"></i></li>
                        <li class="text-right"><span class="counter">23</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="white-box">
                    <h3 class="box-title">SUBJECT</h3>
                    <ul class="list-inline two-part">
                        <li><i class="icon-folder text-purple"></i></li>
                        <li class="text-right"><span class="counter">169</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="white-box">
                    <h3 class="box-title">REQUESTS</h3>
                    <ul class="list-inline two-part">
                        <li><i class="icon-folder-alt text-danger"></i></li>
                        <li class="text-right"><span class="">311</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="white-box">
                    <h3 class="box-title">Users</h3>
                    <ul class="list-inline two-part">
                        <li><i class="fa fa-users text-success"></i></li>
                        <li class="text-right"><span class="">117</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="white-box">
                    <h3 class="box-title">Document</h3>
                    <ul class="list-inline two-part">
                        <li><i class="linea-icon icon-docs fa-fw text-warning"></i></li>
                        <li class="text-right"><span class="">117</span></li>
                    </ul>
                </div>
            </div>
        </div>
<!-- /.row -->
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="white-box">
            <h3 class="box-title">Requests</h3>
            <ul class="list-inline">
                <li>
                    <h5><i class="fa fa-circle m-r-5" style="color: #2cabe3;"></i>All Requests</h5> </li>
                <li>
                    <h5><i class="fa fa-circle m-r-5" style="color: #ff7676;"></i>Pending Requests</h5> </li>
            </ul>
            <div id="ct-visits" style="height: 220px;"></div>
        </div>
    </div>
</div>
    <!-- chartist chart -->
    <script src="/plugins/bower_components/chartist-js/dist/chartist.min.js"></script>
    <script src="/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    
    <script>
        //ct-visits
        new Chartist.Line('#ct-visits', {
          labels: ['12AM', '2AM','6AM', '9AM', '12AM', '3PM', '6PM', '9PM'],
          series: [
            [5, 2, 7, 4, 5, 3, 5, 4],
            [2, 5, 2, 6, 2, 5, 2, 4]
          ]
        }, {
          top:0,

          low:1,
          showPoint: true,
          height:210,
          fullWidth: true,
          plugins: [
            Chartist.plugins.tooltip()
          ],
          axisY: {
            labelInterpolationFnc: function(value) {
              return (value / 1) + 'k';
            }
          },
          showArea: true
        });
    </script>
    
@endsection

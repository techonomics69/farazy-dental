@extends('layouts.wirehouse-admin')

@section('content')

    <div class="content-wraper">
        <div class="white-box mb-20">
            <h3 class="box-title">STUDENT STRENGTH</h3>
        </div>

        

        <div class="white-box">
            <div class="col-mod-12">
                <div class="col-mod-6 col-lg-6">
                        
                        <p class="text-muted m-b-30">List of Student Strength</p>
                </div>        
                <div class="col-mod-6 col-lg-6 ">
                    <a href="{{ route('wirehouse.add_students') }}" class="waves-effect pull-right"><button class="btn btn-xs btn-info pull-right"><i class="fa fa-plus"></i> Add New Strength</button></a>
                </div>    
            </div>  
        <div class="clear"></div><hr/>
        <div class="table-responsive col-mod-12">
            <table class="table table-bordered table-striped" id="student-table">
                <thead>
                <tr>
                    <th style="text-align:center">SL</th>
                    <th style="text-align:center">Year</th>
                    <td style="text-align:center">Clas Name</td>
                    <td style="text-align:center">Number of Students</td>
                    <th style="text-align:center">Action</th>
                    
                </tr>
                </thead>
                <tbody>
                    @foreach($students as $k => $data)
                
                    <tr>
                        <td style="text-align:center">{{ $k+1 }}</td>
                        <td style="text-align:center">{{ $data->year }}</td>
                        <td style="text-align:center">{{ $data->studentClass->name }}</td>
                        <td style="text-align:center">{{ $data->quantity }}</td>
                        <td style="text-align:center">
                            <a href="#" type="button" class="btn btn-warning btn-sm flat"><i class="fa fa-check"></i> Edit</a>
                            <a href="#" type="button" class="btn btn-danger btn-sm flat"><i class="fa fa-check"></i> Delete</a>
                        </td>
                    </tr>

                    @endforeach
                
                </tbody>
            </table>
        </div>

    </div>

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#student-table").dataTable();
        });

    </script>
@endsection

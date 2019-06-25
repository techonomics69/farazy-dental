@extends('layouts.wirehouse-admin')

@section('content')

    <div class="content-wraper" id="app">
       

        <student-list :all_students = "{{ $mystudents }}">
          
        </student-list>

    </div>

@endsection

@section('script')
    <script type="text/javascript">

      $(document).ready(function() {
        $("#product-table").dataTable();
      });

    </script>

@endsection
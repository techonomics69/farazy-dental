@extends('layouts.wirehouse-admin')

@section('content')

    <div class="content-wraper">
        <div class="white-box mb-20">
            <h3 class="box-title">STUDENT STRENGTHS</h3>
        </div>

    

        <div class="white-box">
            
            <h3 class="box-title">CREAT STUDENT STRENGTHS</h3>
            <student-list :our_classes ="{{ $academicClasses }}" ></student-list>
            
            
        </div>

    </div>

@endsection

@section('script')
    
@endsection

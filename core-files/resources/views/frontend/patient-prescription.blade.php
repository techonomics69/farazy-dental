@extends('layouts.front-end',['title' => 'Prescription'])

@section('content')
    <section class="bg-lighter">
        <div class="container pb-10">
            <div class="section-title mb-30">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-uppercase text-theme-colored title-border m-0">Search Prescription</h4>
                    </div>
                </div>
            </div>
            <div class="section-content">
                <form action="{{ route('search-prescription') }}" method="post">
                    {{ csrf_field() }}
                    <div class="row features-style1 mt-20">
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" class="form-control" name="prescription_id" placeholder="Prescription ID" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <button class="btn btn-block btn-primary" style="height: 45px;">SEARCH</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    @if($prescription)
        <section>
            <div class="container">
                <h3 class="box-title text-success">Details <a href="{{ route('download-prescription',['id' => $prescription->id]) }}" target="_blank" class="btn btn-info pull-right">DOWNLOAD</a></h3>
                <hr/>

                <div class="row">
                    <div class="col-md-3">
                        <p><strong class="text-info">Doctor Name: </strong>{{ $prescription->doctor->name }}</p>
                    </div>
                    <div class="col-md-3">
                        <p><strong class="text-info">Prescription ID: </strong>{{ $prescription->prescription_id }}</p>
                    </div>
                    <div class="col-md-3">
                        <p><strong class="text-info">Patient Name: </strong>{{ $prescription->patient_name }}</p>
                    </div>
                    <div class="col-md-3">
                        <p><strong class="text-info">Age: </strong>{{ $prescription->age }}</p>
                    </div>
                </div>

                {{ $prescription->rx }}

                <table class="table table-bordered mb-15 m-t-20">
                    <thead>
                    <tr>
                        <th colspan="5">Medication</th>
                    </tr>
                    <tr>
                        <th>Medicine Name</th>
                        <th>Doses</th>
                        <th>Duration</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($prescription->medicines as $medicine)
                        <tr>
                            <td>{{ $medicine->medicine->item_name }}</td>
                            <td>{{ $medicine->doses }} {{ $medicine->before_eat ? '[ Before Eat]' : '' }}</td>
                            <td>{{ $medicine->duration }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <table class="table table-bordered mb-15">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Necessary Test</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($prescription->tests as $k => $test)
                        <tr>
                            <td>{{ $k+1 }}</td>
                            <td>{{ $test->test->name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <table class="table table-bordered mb-15">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Advices</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($prescription->advices as $k => $advice)
                        <tr>
                            <td>{{ $k+1 }}</td>
                            <td>{{ $advice->advice->name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    @endif
@endsection
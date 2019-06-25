@extends('layouts.doctor')

@section('content')

    <div class="content-wraper">
        <div class="white-box mb-10">
            <h3 class="box-title text-success mb-0">UPDATE PRESCRIPTION</h3>
        </div>

        <form action="{{ route('post-update-prescription',['id' => $prescription->id]) }}" method="post">
            {{ csrf_field() }}

            <div class="white-box mb-10">
                <h3 class="box-title text-muted mb-0">PATIENT INFORMATION</h3>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Prescription ID</label>
                            <input type="text" name="prescription_id" class="form-control" value="{{ $prescription->prescription_id }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Patient Name</label>
                            <input type="text" name="patient_name" class="form-control" value="{{ $prescription->patient_name }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Contact No</label>
                            <input type="text" name="contact_no" class="form-control" value="{{ $prescription->contact_no }}">
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <label>Age</label>
                            <input type="number" name="age" class="form-control" value="{{ $prescription->age }}">
                        </div>
                    </div>
                    <div class="col-md-2">
                        Sex
                        <div class="form-group">
                            <label class="radio-inline"><input type="radio" name="gender" value="1" {{ $prescription->gender == 1 ? 'checked="checked"' : '' }}>M</label>
                            <label class="radio-inline"><input type="radio" name="gender" value="0" {{ $prescription->gender == 0 ? 'checked="checked"' : '' }}>F</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Prblem Description</label>
                    <select name="symptoms[]" class="select2 m-b-10 select2-multiple" multiple="multiple" data-placeholder="Choose" style="width: 100%; display: block; border-radius: 0px; margin-bottom: 10px">
                        @foreach($symptoms as $symptom)
                            @if (strpos($prescription->rx, $symptom->name) !== false) {
                                <option value="{{ $symptom->name }}" selected="selected">{{ $symptom->name }}</option>
                            @else
                                <option value="{{ $symptom->name }}">{{ $symptom->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    <textarea name="rx"  cols="30" rows="5" class="form-control" style="margin-top:15px">{{ $prescription->rx }}</textarea>
                </div>

                <edit-prescription :items="{medicines: {{ $medicines }},tests: {{ $tests }}, advices: {{ $advices }},test_lists: {{ $test_lists }},medicine_lists: {{ $medicine_lists }},advices_lists: {{ $advice_lists }} }"></edit-prescription>

            </div>
            <div class="form-group text-right">
                <button type="submit" class="btn btn-info flat"><i class="fa fa-check-circle"></i> Save Prescription</button>
            </div>
        </form>

    </div>


@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#appointmentList").dataTable();
            $(".select2").select2();
        });

    </script>
@endsection

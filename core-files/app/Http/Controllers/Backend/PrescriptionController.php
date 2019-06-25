<?php

namespace App\Http\Controllers\Backend;

use App\Model\Advice;
use App\Model\Doctor;
use App\Model\Item\Item;
use App\Model\Prescription;
use App\Model\PrescriptionAdvice;
use App\Model\PrescriptionMedicine;
use App\Model\PrescriptionTest;
use App\Model\Symptom;
use App\Model\Test;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use PDF;

class PrescriptionController extends Controller
{
    public function index(){
        $doctor = Auth::user()->doctor;
        $prescriptions = Prescription::where('doctor_id',$doctor->id)->orderBy('id','desc')->take(2000)->get();
        return view('doctor.prescription.index')->with([
            'prescriptions' => $prescriptions
        ]);
    }
    public function create(){
        $doctor = Doctor::findOrFail(Auth::user()->type_ref);
        $date = Carbon::today();
        $pd = count(Prescription::where('doctor_id',$doctor->id)->get()) + 1;
        $prescription_no = 'P-'.$date->year.'-' . $date->month.'-'. $date->day. '-'. $doctor->id .'-' .str_pad($pd,6,'0',STR_PAD_LEFT);
        $medicines = Item::orderBy('item_name','asc')->get();
        $tests = Test::orderBy('id','desc')->get();
        $advices = Advice::orderBy('id','desc')->get();
        $symptoms = Symptom::all();
        return view('doctor.prescription.create-prescription')->with([
            'prescription_id'  => $prescription_no,
            'tests' => $tests,
            'medicines' => $medicines,
            'advices'   => $advices,
            'symptoms'  => $symptoms
        ]);
    }

    public function store(Request $request){
        $data = $request->only(['prescription_id','patient_name','contact_no','age','gender']);
        $data['doctor_id'] = Auth::user()->type_ref;
        $data['rx'] = implode('.', $request->symptoms)."." .$request->rx;
        $prescription = Prescription::create($data);

        if($request->input('medicine')){
            foreach ($request->input('medicine') as $medicine){
                PrescriptionMedicine::create([
                    'prescription_id'   => $prescription->id,
                    'medicine_id'       => $medicine['id'],
                    'duration'          => $medicine['duration'],
                    'doses'             => $medicine['doses'],
                    'before_eat'        => isset($medicine['before']) ? true : false,
                ]);
            }
        }
        if($request->input('tests')){
            foreach ($request->input('tests') as $test){
                PrescriptionTest::create([
                    'prescription_id'   => $prescription->id,
                    'test_id'           => $test['id'],
                    'comment'           => $test['comment']
                ]);
            }
        }
        if($request->input('advice')){
            foreach ($request->input('advice') as $advice){
                PrescriptionAdvice::create([
                    'prescription_id'   => $prescription->id,
                    'advice_id'         => $advice['id']
                ]);
            }
        }
        
        if($request->advice_text){
            $advice = Advice::firstOrCreate([
                'name'  => $request->advice_text
            ]);
            PrescriptionAdvice::create([
                'prescription_id'   => $prescription->id,
                'advice_id'         => $advice->id
            ]);
        }


        return redirect()->route('doctor-prescription-detail',['id' => $prescription->id]);
    }

    public function show($id){
        $prescription = Prescription::findOrFail($id);
        return view('doctor.prescription.show')->with([
            'prescription'  => $prescription
        ]);
    }

    public function edit($id){
        $prescription = Prescription::findOrFail($id);
        $p_medicines = count($prescription->medicines) ? $prescription->medicines->pluck('medicine_id') : [];
        $p_advices = count($prescription->advices) ? $prescription->advices->pluck('advice_id') : [];
        $p_tests = count($prescription->advices) ? $prescription->tests->pluck('test_id') : [];

        $medicines = Item::whereNotIn('id',$p_medicines)->orderBy('item_name','asc')->get();
        $tests = Test::whereNotIn('id',$p_tests)->orderBy('id','desc')->get();
        $advices = Advice::whereNotIn('id',$p_advices)->orderBy('id','desc')->get();

        if(Auth::user()->isDoctor && Auth::user()->type_ref == $prescription->doctor_id){

            $medicine_lists = [];
            $test_lists = [];
            $advice_lists = Advice::whereIn('id',$p_advices)->get();

            foreach ($prescription->medicines as $prescriptionMedicine){
                $medicine = Item::findOrFail($prescriptionMedicine->medicine_id);
                $medicine->duration = $prescriptionMedicine->duration;
                $medicine->doses = $prescriptionMedicine->doses;
                $medicine->before_eat = $prescriptionMedicine->before_eat;
                $medicine_lists[] = $medicine;
            }

            foreach ($prescription->tests as $prescriptionTest){
                $test = Test::findOrFail($prescriptionTest->test_id);
                $test->comment = $prescriptionTest->comment;
                $test_lists[] = $test;
            }

            $symptoms = Symptom::all();

            return view('doctor.prescription.edit-prescription')->with([
                'prescription'  => $prescription,
                'tests' => $tests,
                'medicines' => $medicines,
                'advices'   => $advices,
                'medicine_lists'    => json_encode($medicine_lists),
                'advice_lists'    => $advice_lists,
                'test_lists'    => json_encode($test_lists),
                'symptoms'  => $symptoms
            ]);
        }

        return redirect()->back()->withMessage([
            'status'    => 'alert alert-danger',
            'text'      => 'You are not authorized to update this prescription'
        ]);
    }

    public function update(Request $request,$id){
        $prescription = Prescription::findOrFail($id);
        $data = $request->only(['prescription_id','patient_name','contact_no','age','gender']);
        $data['rx'] = implode('.', $request->symptoms)."." .$request->rx;
        if(Auth::user()->isDoctor && Auth::user()->type_ref == $prescription->doctor_id){

            $prescription->update($data);
            PrescriptionMedicine::where('prescription_id',$prescription->id)->delete();
            PrescriptionTest::where('prescription_id',$prescription->id)->delete();
            PrescriptionAdvice::where('prescription_id',$prescription->id)->delete();
            if($request->input('medicine')){
                foreach ($request->input('medicine') as $medicine){
                    PrescriptionMedicine::create([
                        'prescription_id'   => $prescription->id,
                        'medicine_id'       => $medicine['id'],
                        'duration'          => $medicine['duration'],
                        'doses'             => $medicine['doses'],
                        'before_eat'        => isset($medicine['before']) ? true : false,
                    ]);
                }
            }
            if($request->input('tests')){
                foreach ($request->input('tests') as $test){
                    PrescriptionTest::create([
                        'prescription_id'   => $prescription->id,
                        'test_id'           => $test['id'],
                        'comment'           => $test['comment']
                    ]);
                }
            }
            if($request->input('advice')){
                foreach ($request->input('advice') as $advice){
                    PrescriptionAdvice::create([
                        'prescription_id'   => $prescription->id,
                        'advice_id'         => $advice['id']
                    ]);
                }
            }
            if($request->advice_text){
                $advice = Advice::firstOrCreate([
                    'name'  => $request->advice_text
                ]);
                PrescriptionAdvice::create([
                    'prescription_id'   => $prescription->id,
                    'advice_id'         => $advice->id
                ]);
            }


            return redirect()->route('doctor-prescription-detail',['id' => $prescription->id]);
        }

        return redirect()->back()->withMessage([
            'status'    => 'alert alert-danger',
            'text'      => 'You are not authorized to update this prescription'
        ]);
    }

    public function delete($id){
        $prescription = Prescription::findOrFail($id);
        if(Auth::user()->isDoctor && Auth::user()->type_ref == $prescription->doctor_id){
            Prescription::findOrFail($id)->delete();
            return redirect()->back()->withMessage([
                'status'    => 'alert alert-success',
                'text'      => 'Successfully deleted this prescription'
            ]);
        }
        return redirect()->back()->withMessage([
            'status'    => 'alert alert-danger',
            'text'      => 'You are not authorized to update this prescription'
        ]);
    }

    public function download($id){
        $prescription = Prescription::findOrFail($id);
        $pdf = PDF::loadView('prescription',[
            'prescription'  => $prescription,
        ]);
        return $pdf->download('invoice.pdf');
        return view('prescription')->with([
            'prescription'  => $prescription,
            'organization'  => null,
        ]);
    }
}

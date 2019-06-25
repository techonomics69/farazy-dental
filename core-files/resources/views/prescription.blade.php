<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @page {
            margin: 0px;
            margin-top: 140px;
            margin-bottom: 45px;
        }
        header {
            position: fixed;
            top: -140px;
            left: 0px;
            right: 0px;
            background-color: #FFF;
            height:118px;
            line-height: 1.2;
            border-bottom: 2px solid #EEEEEE;
            padding: 10px 0;
        }
        footer {
            position: fixed;
            bottom: -45px;
            left: 0px;
            right: 0px;
            height: 45px;
        }

        .container{
            width: 793px;
            margin: 0 auto;
            border: 1px solid #0ca040;
        }
        .table{
            width: 100%;
        }
        .w-50{
            width: 35%;
        }
        .w-30{
            width: 30%;
            vertical-align: top;
        }
        .w-70{
            width:70%;
        }
        .logo img{
            height: 50px;
            width: auto;
        }
        .text-right{
            text-align: right;
        }

        /**
        Header Table
         */
        .header-table p{
            margin: 5px 0;
            line-height: 1;
        }
        .doctor-designation{
            font-size: 14px;
            font-weight: normal;
        }
        .doctor-specialization{
            font-size: 12px;
            font-weight: bold;
        }
        /**
        Patient
         */
        .patient-table{
            background-color: #bcea7e;
        }
        .widget-heading{
            background-color: #89C43A;
            margin-top: 10px;
        }
        .widget-content{
            font-size: 14px;
        }
        /**
        Medicine
         */
        .medicine-table,.test-table,.advice-table{
            font-size: 12px;
            font-weight: normal;
            margin-bottom: 20px;
        }
        .footer-table{
            font-size: 12px;
            font-weight: normal;
            background-color: #89C43A;
        }
        .table th{
            text-align: left;
        }
        th.w-25-px{
            width: 25px;
        }
        .table-container{
            padding-left: 10px;
            border-left: 1px solid #0ca040;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <table class="header-table table">
                <tbody>
                <tr>
                    <td class="w-50">
                        <p class="doctor-name">{{ $prescription->doctor->name  }}</p>
                        <p class="doctor-designation">{{ $prescription->doctor->designation ? $prescription->doctor->designation->title : ''  }}</p>
                        <p class="doctor-specialization">{{ $prescription->doctor->specialization  }}</p>
                    </td>
                    <td class="w-50">
                        <div class="logo text-right">
                            <img src="{{ asset($settings->logo) }}" alt="Logo">
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <table class="table patient-table">
                <tbody>
                <tr>
                    <td><strong>Name: </strong>{{ $prescription->patient_name }}</td>
                    <td><strong>Sex: </strong>{{ $prescription->gender ? 'Male' : 'Female' }}</td>
                    <td><strong>Age: </strong>{{ $prescription->age  }}</td>
                    <td><strong>Date: </strong>{{ $prescription->prescription_date  }}</td>
                </tr>
                </tbody>
            </table>
        </header>
        <div class="content">
            <table class="table">
                <tr>
                    <td class="w-30">
                        <p class="widget-heading">Chief Complain</p>
                        <p class="widget-content">{{ $prescription->rx }}</p>
                    </td>
                    <td class="w-70 table-container">
                        <table class="table medicine-table">
                            <thead>
                            <tr>
                                <th class="w-25-px">SL</th>
                                <th>Medicine Name</th>
                                <th>Doses</th>
                                <th>Duration</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($prescription->medicines as $k => $medicine)
                                <tr>
                                    <td>{{ $k+1 }}</td>
                                    <td>{{ $medicine->medicine->item_name }}</td>
                                    <td>{{ $medicine->doses }} {{ $medicine->before_eat ? '[ Before Eat]' : '' }}</td>
                                    <td>{{ $medicine->duration }} Days</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <table class="table test-table">
                            <thead>
                            <tr>
                                <th class="w-25-px">SL</th>
                                <th>Necessary Test</th>
                                <th>Comment</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($prescription->tests as $k => $test)
                                <tr>
                                    <td>{{ $k+1 }}</td>
                                    <td>{{ $test->test->name }}</td>
                                    <td>{{ $test->comment }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <table class="table advice-table">
                            <thead>
                            <tr>
                                <th class="w-25-px">SL</th>
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
                    </td>
                </tr>
            </table>
        </div>
        <footer>
            <table class="footer-table table">
                <tbody>
                <tr>
                    <td>
                        {{ $settings->address }}
                    </td>
                    <td>
                        <p class="web">http://farazydental.com/</p>
                    </td>
                </tr>
                </tbody>
            </table>
        </footer>
    </div>
</body>
</html>
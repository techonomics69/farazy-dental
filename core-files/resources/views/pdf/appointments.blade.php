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
            margin-bottom: 100px;
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
            bottom: -100px;
            left: 0px;
            right: 0px;
            background-color: #FFF;
            height: 78px;
            line-height: 1.2;
            border-top: 2px solid #EEEEEE;
            padding: 10px 0;
        }

        .body-text{

        }
        table{
            width: 100%;
            margin:0;
            padding: 0;
        }
        .w-50{
            width: 50%;
        }
        .text-right{
            text-align: right;
        }
        .header-table{
            width: 100%;
            height: 120px;
            color: #7D8080;
            font-size: 16px;
            padding-left: 30px;
            padding-right: 30px;
        }
        .header-table > tbody > tr > td{
            vertical-align: middle;
        }
        .header-table > tbody > tr > td:last-child {

        }
        .header-table > tbody > tr > td > span{
            display: inline-block;
            margin-right: 10px;
        }
        .header-table > tbody > tr > td p{
            margin:0;
            padding: 0;
            line-height: 1;
        }
        .header-table > tbody > tr > td .header-icon{
            display: inline-block;
            width: 16px;
            height: 16px;
            vertical-align: middle;
            margin-right: 10px;
        }
        .header-table > tbody > tr > td > .contact-title{
            color: #333;
            margin:0;
            padding: 7px 0;
        }
        .header-table > tbody > tr > td > .invoice-title{
            font-size: 36px;
            color: #333;
            text-align: right;
            display: block;
        }


        .footer-table{
            width: 100%;
            height: 100%;
            color: #7D8080;
            font-size: 16px;
            padding-left: 30px;
            padding-right: 30px;
        }
        .footer-table > tbody > tr > td{
            text-align: center;
            border-right: 1px solid #EEEEEE;
            width: 25%;
            font-size: 12px;
        }
        .footer-table > tbody > tr > td:last-child {
            border-right: 0px;
        }
        .footer-table > tbody > tr > td > span{
            display: block;
        }
        .footer-table > tbody > tr > td .footer-icon{
            display: inline-block;
            width: 24px;
            height: 24px;
            vertical-align: middle;
        }
        .footer-table > tbody > tr > td .footer-logo{
            height: 40px;
        }


        .customer-area{
            font-size: 12px;
            padding: 15px 30px;
        }
        .customer-area p{
            margin:0;
            padding: 0;
        }
        .customer-area > tbody > tr > .due-left {
            background-color: #EEEEEE;
            color: #333333;
            padding: 0 10px;
        }
        .customer-area > tbody > tr > .due-amount {
            background-color: #00AEEF;
            color: #FFFFFF;
            padding: 0 10px;
        }
        .customer-area > tbody > tr > td {
            vertical-align: middle;
        }
        .customer-area > tbody > tr > td .phone-email span{
            margin-right: 7px;
        }
        .customer-area > tbody > tr > td .customer-icon{
            display: inline-block;
            width: 16px;
            height: 16px;
            vertical-align: middle;
            margin-right: 7px;
        }

        .items-list-table{
            width: 100%;
            padding: 15px 30px;
        }
        .items-list-table > thead > tr > th{
            color: #333;
            font-weight: normal;
            padding: 5px;
        }
        .items-list-table > thead > tr > .bg-gray{
            background-color: #00AEEF;
        }
        .items-list-table > tbody > tr > .bg-black{
            background-color: #000;
            color: #FFFFFF;
        }
        .items-list-table > tbody > tr > td{
            font-size: 12px;
            padding: 5px;
            line-height: 1.4;
        }
        .items-list-table > tbody > tr > .bg-light-gray{
            background-color: #EEEEEE;
        }

        .items-list-table .terms-container{
            padding-left: 0px;
        }

        .terms-container{
            padding: 10px 30px;
            font-size: 12px;
            text-align: justify;
        }

        .terms-title{
            font-size: 16px;
            font-weight: bold;
            border-bottom: 1px solid #333;

        }
        .terms{
            text-align: justify;
        }
        .signature-area{
            width: 100%;
            padding: 30px;
        }
        .signature-area > tbody > tr > td{}
        .signature-text{
            line-height: 1.4;
        }
        .bg-green{
            background-color: #53e69d;
            color: #000;
        }
        .transaction-title{
            background-color: #EEEEEE;
            color: #333;
            font-size: 16px;
            text-align: center;
            padding: 10px;
        }

        .transaction-table{}
        .transaction-table > thead > tr > th{
            padding: 5px;
        }
        .transaction-table > tbody > tr > td{
            padding: 5px;
        }
        .header-logo{
            width: 200px;
        }



    </style>
</head>
<body>
<header>
    <table class="header-table">
        <tbody>
        <tr>
            <td class="w-50">
                <img src="{{ asset($settings ? $settings->logo : '') }}" alt="FARAZY DENTAL" class="header-logo">
            </td>
            <td class="text-right"><span class="invoice-title">APPOINTMENT LIST</span></td>
        </tr>
        </tbody>
    </table>
</header>


<div class="body-text">
    <table class="items-list-table">
        <thead>
        <tr>
            <th>No</th>
            <th class="bg-gray">Doctor Name</th>
            <th class="bg-gray">Patient Name</th>
            <th class="bg-gray">Contact No</th>
            <th class="bg-gray">Serial No</th>
        </tr>
        </thead>
        <tbody>
        @foreach($appointments as $k => $appointment)
            <tr>
                <td class="bg-light-gray">{{ $k+1 }}</td>
                <td class="bg-light-gray">{{ $appointment->doctor->name }}</td>
                <td class="bg-light-gray">{{ $appointment->patient_name }}</td>
                <td class="bg-light-gray">{{ $appointment->contact_no }}</td>
                <td class="bg-light-gray">{{ $appointment->sl_no }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
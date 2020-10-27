<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <style>
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
        }

        body {
            font-family: "THSarabunNew";
        }


        .page-break {
            page-break-after: always;
        }

        /* Style the top navigation bar */
        .topnav {
            overflow: hidden;
            /* background-color: coral; */
            text-align: center;
            border-top: 1px solid black;
            border-left: 1px solid black;
            border-right: 1px solid black;
        }

        /* Style the content */
        .content {
            /* background-color: #ddd; */
            /* padding: 5px; */
            border: 1px solid black;
            /* border-left: 1px solid black;
    border-right: 1px solid black; */
        }

        /* Style the footer */
        .footer {
            /* background-color: darkcyan; */
            /* padding-bottom: 5px; */
            border-bottom: 1px solid black;
            border-left: 1px solid black;
            border-right: 1px solid black;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        p {
            padding: 0px !important;
            margin: 0px !important;
        }

        table {
            border-collapse: collapse;
        }

        table,
        th,
        td {
            padding: 5px;
            /* border: 1px solid black; */
        }

        hr {
            border-top: 0.2px solid black;
            padding: 0px;
            margin: 0px;
        }
    </style>
</head>

<body>
    <div class="topnav">
        <h2>CONTRACT REQUEST FORM</h2>
        This form must be received in Legal Department <br>
        <font style="font-weight: bold; text-decoration: underline;">ONE WEEK</font> PRIOR to commencement of the
        Contract Period <br>
        [ Excludes the contract price is less than 100,000 baht ] <br>
    </div>

    <div class="content">
        <table style="width: 100%">
            <tbody>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        * = Required Information
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right;">
                        <h4>ACTION : </h4>
                    </td>

                    <td style="width: 80%;">
                        <font style="text-decoration: underline">{{$contract->legalAction->name}}</font>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right;">
                        <h4>GENERAL AGREEMENTS : </h4>
                    </td>
                    <td style="width: 80%;">
                        <font style="text-decoration: underline">{{$contract->legalAgreement->name}}</font>
                    </td>
                </tr>
            </tbody>
        </table>
        <h4 style="text-align: center;">CONTRACT INFORMATION</h4>
        <table style="width: 100%;">
            <tbody>
                <tr>
                    <td style="text-align: right;">
                        <h4>Full name (Company’s, Person’s) : </h4>
                    </td>
                    <td style="width: 44%;">
                        <font style="text-decoration: underline">{{$contract->company_name}}</font>
                    </td>
                    <td style="text-align: right; width: 25%;">
                        <h4>Company Certificate : </h4>
                    </td>
                    <td style="width: 3%;">
                        <input type="checkbox" {{$contract->company_cer ? "checked" : ""}}>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right;">
                        <h4>Legal Representative :</h4>
                    </td>
                    <td>
                        <font style="text-decoration: underline">{{$contract->representative}}</font>
                    </td>
                    <td style="text-align: right;">
                        <h4>Representative Certificate :</h4>
                    </td>
                    <td>
                        <input type="checkbox" {{$contract->representative_cer ? "checked" : ""}}>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right;">
                        <h4>Address : </h4>
                    </td>

                    <td colspan="3">
                        <font style="text-decoration: underline">{{$contract->address}}</font>
                    </td>
                </tr>
            </tbody>

        </table>
        <hr>
        <h4 style="text-align: center;">Hire of Work/Service Contract</h4>
        <table style="width: 100%;">
            <tbody>
                <tr>
                    <td>
                        <h5 style="text-decoration: underline;">Supporting Documents</h5>
                    </td>
                    <td style="text-align: right;">Purchase Order :</td>
                    <td style="width: 3%;">
                        <font><input type="checkbox" {{$contract->legalContractDest->purchase_order ? "checked" : ""}}>
                        </font>
                    </td>
                    <td style="text-align: right;">Quotation :</td>
                    <td style="width: 3%;">
                        <font><input type="checkbox" {{$contract->legalContractDest->quotation ? "checked" : ""}}>
                        </font>
                    </td>
                    <td style="text-align: right;">AEC/Coparation Sheet :</td>
                    <td style="width: 3%;">
                        <font><input type="checkbox"
                                {{$contract->legalContractDest->coparation_sheet ? "checked" : ""}}></font>
                    </td>
                    <td style="text-align: right;">Work Plan :</td>
                    <td style="width: 3%;">
                        <font><input type="checkbox" {{$contract->legalContractDest->work_plan ? "checked" : ""}}>
                        </font>
                    </td>

                </tr>
                <tr>
                    <td>
                        <h5 style="text-decoration: underline;">Comercial Terms</h5>
                    </td>
                    <td style="text-align: right;">Scope of Work :</td>
                    <td colspan="7">
                        <font style="text-decoration: underline;">
                            {{$contract->legalContractDest->legalComercialTerm->scope_of_work}}</font>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: right;">Location :</td>
                    <td colspan="7">
                        <font style="text-decoration: underline;">
                            {{$contract->legalContractDest->legalComercialTerm->location}}</font>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: right;">Purchase Order No. :</td>
                    <td colspan="7">
                        <font style="text-decoration: underline;">
                            {{$contract->legalContractDest->legalComercialTerm->purchase_order_no}}</font>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: right;">Quotation No. :</td>
                    <td colspan="2">
                        <font style="text-decoration: underline;">
                            {{$contract->legalContractDest->legalComercialTerm->quotation_no}}</font>
                    </td>
                    <td style="text-align: right;">Dated:</td>
                    <td colspan="4">
                        <font style="text-decoration: underline;">
                            {{$contract->legalContractDest->legalComercialTerm->dated->format('Y-m-d')}}</font>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: right;">Contract period :</td>
                    <td colspan="2">
                        <font style="text-decoration: underline;">
                            {{$contract->legalContractDest->legalComercialTerm->contract_period->format('Y-m-d')}}
                        </font>
                    </td>
                    <td style="text-align: right;">Untill:</td>
                    <td colspan="4">
                        <font style="text-decoration: underline;">
                            {{$contract->legalContractDest->legalComercialTerm->untill->format('Y-m-d')}}</font>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="footer">
        <h3 style="text-align: center">LOCATION INFORMATION</h3>
        <table style="width: 100%;">
            <tbody>
                <tr>
                    <td style="text-align: right;">
                        <h4>Requestor : </h4>
                    </td>

                    <td style="">
                        <font style="text-decoration: underline">{{$contract->createdBy->name}}</font>
                    </td>
                    <td style="text-align: right">Date : </td>
                    <td style="">
                        <font style="text-decoration: underline">{{$contract->created_at->format('Y-m-d')}}</font>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right;">
                        <h4>Department : </h4>
                    </td>

                    <td>
                        <font style="text-decoration: underline">{{$contract->createdBy->department->name}}</font>
                    </td>
                    <td style="text-align: right;">Phone : </td>
                    <td>
                        <font style="text-decoration: underline">{{$contract->createdBy->phone}}</font>
                    </td>
                </tr>
            </tbody>
        </table>
        <table
            style="width: 100%; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; padding-bottom:5px;">
            <tbody>
                <tr>
                    <td colspan="2"
                        style="height: 70px; width: 50%; vertical-align: text-top; border-right: 1px solid black; ">
                        Requestor by: </td>
                    <td colspan="2" style="height: 70px; width: 50%; vertical-align: text-top;  ">Checked by: </td>
                </tr>
                <tr>
                    <td style="width: 25%; text-align: right;border:1px solid black;">Department :</td>
                    <td style="text-align: center; border:1px solid black; width: 80%;">
                        <font>{{$contract->createdBy->department->name}}</font>
                    </td>
                    <td style="width: 25%; text-align: right; border:1px solid black; ">Department :</td>
                    <td style="text-align: center; border:1px solid black; width: 80%;">
                        <font>{{$contract->checkedBy->department->name}}</font>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
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
            padding: 5px
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
                    <td colspan="3" style="text-align: center;">
                        * = Required Information
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right;">
                        <h4>ACTION : </h4>
                    </td>

                    <td style="width: 20%;">
                        <font style="text-decoration: underline">New contract</font>
                    </td>
                    <td style="width: 60%;"></td>
                </tr>
                <tr>
                    <td style="text-align: right;">
                        <h4>GENERAL AGREEMENTS : </h4>
                    </td>
                    <td style="width: 20%;">
                        <font style="text-decoration: underline">Hire of Work/Service</font>
                    </td>
                    <td style="width: 60%;"></td>
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

                    <td style="width: 45%;">
                        <font style="text-decoration: underline">Company’s</font>
                    </td>
                    <td style="width: 27%;"></td>
                </tr>
                <tr>
                    <td style="text-align: right;">
                        <h4>Legal Representative : </h4>
                    </td>

                    <td style="width: 45%;">
                        <font style="text-decoration: underline">Representative</font>
                    </td>
                    <td style="width: 27%;"></td>
                </tr>
                <tr>
                    <td style="text-align: right;">
                        <h4>Address : </h4>
                    </td>

                    <td style="width: 45%;">
                        <font style="text-decoration: underline">address</font>
                    </td>
                    <td style="width: 27%;"></td>
                </tr>
            </tbody>

        </table>
        <hr>
        <h4 style="text-align: center;">Hire of Work/Service Contract</h4>
        <table>
            <tbody>
                <tr>
                    <td><h5 style="text-decoration: underline;">Supporting Documents</h5></td>
                    <td style="text-align: right;">Purchase Order :</td>
                    <td><font style="text-decoration: underline;">true</font></td>
                    <td style="text-align: right;">Quotation :</td>
                    <td><font style="text-decoration: underline;">true</font></td>
                    <td style="text-align: right;">AEC/Coparation Sheet :</td>
                    <td><font style="text-decoration: underline;">true</font></td>
                    <td style="text-align: right;">Work Plan :</td>
                    <td><font style="text-decoration: underline;">true</font></td>

                </tr>
                <tr>
                    <td><h5 style="text-decoration: underline;">Comercial Terms</h5></td>
                    <td>Scope of Work :</td>
                    <td colspan="7"><font style="text-decoration: underline;">test...</font></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: right;">Location :</td>
                    <td colspan="7"><font style="text-decoration: underline;">test...</font></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: right;">Purchase Order No. :</td>
                    <td colspan="7"><font style="text-decoration: underline;">test...</font></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: right;">Quotation No. :</td>
                    <td><font style="text-decoration: underline;">test...</font></td>
                    <td style="text-align: right;">Dated :</td>
                    <td><font style="text-decoration: underline;">10/01/2020</font></td>
                    <td colspan="4"></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: right;">Contract period :</td>
                    <td><font style="text-decoration: underline;">10/01/2020</font></td>
                    <td style="text-align: right;">Untill :</td>
                    <td><font style="text-decoration: underline;">10/01/2020</font></td>
                    <td colspan="4"></td>
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
                        <font style="text-decoration: underline">pipat .....</font>
                    </td>
                    <td style="text-align: right">Date : </td>
                    <td style="">
                        <font style="text-decoration: underline">01/10/2020</font>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right;">
                        <h4>Department : </h4>
                    </td>

                    <td>
                        <font style="text-decoration: underline">IT .....</font>
                    </td>
                    <td style="text-align: right;">Phone : </td>
                    <td>
                        <font style="text-decoration: underline">0808080080</font>
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
                        <font>IT....</font>
                    </td>
                    <td style="width: 25%; text-align: right; border:1px solid black; ">Department :</td>
                    <td style="text-align: center; border:1px solid black; width: 80%;">
                        <font>Legal.....</font>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
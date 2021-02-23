<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link
        href=”https://fonts.googleapis.com/css2?family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel=”stylesheet”>
    <style>
        body {
            font-family: 'sarabun', sans-serif;
            /* font-size: 20px; */
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding-left: 5px;
            text-align: left;
        }
    </style>
</head>

<body>
    <table>
        <thead>
        </thead>
        <tbody>
            @foreach ($accessories as $key => $item)
            @if ($key % 2 == 0)
            <tr>
                @endif
                <td>{{$item->access_name}}</td>
                @if ($item->totals)
                <td style="width: 15px;">{{$item->totals}}</td>
                @else
                <td style="width: 15px;">0</td>
                @endif
                <td style="width: 15px;">__</td>
                @if (($key + 1) % 2 == 0)
            </tr>
            @endif
            @endforeach
            @if (($key + 1) % 2 != 0)
            </tr>
            @endif
        </tbody>
    </table>
</body>

</html>
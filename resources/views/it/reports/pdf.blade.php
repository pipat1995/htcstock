<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
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
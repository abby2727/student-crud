<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Export</title>

    <style>
        #emp {
            border-collapse: collapse;
            width: 100%;
        }

        #emp td,
        #emp th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #emp tr:nth-child(even) {
            background-color: #0bfdfd;
        }

        #emp th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4caf50;
            color: #fff;
        }
    </style>
</head>

<body>
    <a href="{{ url('/download-generate-pdf') }}" style="float: right;">Download Data</a>

    <table id="emp">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Course</th>
                <th>Date (mm/dd/yyyy)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($student as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->course }}</td>
                    <td>
                        {{ $item->date->format('F j, Y') }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>

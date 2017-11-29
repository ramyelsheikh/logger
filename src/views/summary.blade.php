<!DOCTYPE html>
<html>
<head>
    <title>Summary</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
</head>
<body>
@if (count($logs) === 0)
    <h1 style="text-align:center">
        <span style="font-weight:normal">No Records</span>
    </h1>
@else
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Time</th>
            <th scope="col">Page</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($logs as $id => $log)
        <tr>
            <th scope="row">{{$log['time']}}</th>
            <th scope="row">{{$log['page']}}</th>
        </tr>
        @endforeach
        </tbody>
    </table>
@endif
</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>{{ $data->name }}</title>
</head>
<body>
    @if(isset($data->process_id))
        <h1>Procedure Name:</h1>
        <h1>{{ $data->name }}</h1>
        <h2>Procedure Description:</h2>
        <div>
            <p>{{ $data->description}}</p>
        </div>
        <h2>Belongs to process_id:</h2>
        <div>
            <p>{{$data->process_id}}</p>
        </div>
    @else
        <h1>Process Name:</h1>
        <h1>{{ $data->name }}</h1>
        <h2>Process Description:</h2>
        <div>
            <p>{{ $data->description}}</p>
        </div>
    @endif
</body>
</html>

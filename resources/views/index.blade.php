<?php
    use App\Model\taskmanagerModel;
    use App\Http\Controllers\taskmanagerController;
    use Illuminate\Pagination\LengthAwarePaginator;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>function conFirm() {
            return confirm ("ban chac chan muon xoa chu")
        }</script>
</head>
<body>
<table class="table">
    <thead>
    <tr>
        <th scope="col">STT</th>
        <th scope="col">Ho va ten</th>
        <th scope="col">Phone</th>
        <th scope="col">Email</th>
    </tr>
    </thead>
    <tbody>
    @foreach($managers as $key => $manager)
    <tr>
        <th scope="row">{{ ++$key }}</th>
        <td>{{ $manager->user_name }}</td>
        <td>{{ $manager->phone }}</td>
        <td>{{ $manager->email }}</td>
        <td><a href="{{route('edit', $manager->id)}}">Edit</a> </td>
        <td><a href="{{route('delete', $manager->id)}}" onclick="conFirm()">Delete</a> </td>
    </tr>
        @endforeach
    </tbody>
</table>
{{ $managers->appends(request()->query()) }}
<a href="{{route('create')}}">Add</a>
</body>
</html>
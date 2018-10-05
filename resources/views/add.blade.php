<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1> This is Add Page</h1>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 <form method="post" action="{{ route('store') }}" >
        @csrf
        <input type="text" name="name" placeholder="Nhap ten">
        <input type="text" name="phone" placeholder="Nhap phone">
        <input type="text" name="email" placeholder="Nhap email">
        <input type="submit" value="Submit">
    </form>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <form action="{{ route('login') }}" method="post">
            {{ csrf_field() }}
            <input type="email" name="email" placeholder="email" required >
            <input type="password" name="password" placeholder="password" required >
            <input type="checkbox" name="rememeber" placeholder="email"  >

            <input type="submit">
        
        </form>
    </div>
</body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <title>New user</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body style="background-color:#f5f5f5">
        <div style='max-width:5%;max-height:5%;' class="w3-margin">
            <a href="{{URL::to('/')}}"><img src="{{asset('assets/home.png')}}" alt="home" class="w3-image"></a>
        </div>
        <b>Register a new user</b>:
        <form method="POST" action="{{action([App\Http\Controllers\UsersController::class, 'store']) }}" class="w3-container">
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <label for="username">Username: </label>
            <input type="text" name="username" id="username" class="w3-input">
            <label for="email">Email: </label>
            <input type="text" name="email" id="email" class="w3-input">
            <input type="submit" value="add" class="w3-btn w3-round-large w3-teal w3-margin">
        </form>
    </body>
</html>
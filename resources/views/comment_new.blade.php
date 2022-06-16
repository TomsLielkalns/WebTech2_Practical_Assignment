<!DOCTYPE html>
<html>
    <head>
        <title>New Comment</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body style="background-color:#f5f5f5">
        <div style='max-width:5%;max-height:5%;' class="w3-margin">
            <a href="{{URL::to('/')}}"><img src="{{asset('assets/home.png')}}" alt="home" class="w3-image"></a>
        </div>
        Adding a new comment for <b>{{ $flower->name }}</b>:
        <form method="POST" action="{{action([App\Http\Controllers\CommentsController::class, 'store']) }}" class="w3-container">
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
            <input type="hidden" name="flowers_id" value="{{ $flower->id }}" class="w3-input">
            <br></br>
            <select id="users_id" name="users_id" class="w3-input">
                <option hidden>Choose User</option>
                @foreach ($users as $users)
                <option value="{{ $users->id }}">{{ $users->username }}</option>
                @endforeach
            </select>
            <br></br>
            <label for="comment">Comment: </label>
            <br></br>
            <textarea id="comment" name="comment" rows="4" cols="50" class="w3-input"></textarea>
            <input type="submit" value="add" class="w3-btn w3-round-large w3-teal w3-margin">
        </form>
    </body>
</html>
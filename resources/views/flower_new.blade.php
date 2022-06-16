<!DOCTYPE html>
<html>
    <head>
        <title>New flower</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body style="background-color:#f5f5f5">
        <div style='max-width:5%;max-height:5%;' class="w3-margin">
            <a href="{{URL::to('/')}}"><img src="{{asset('assets/home.png')}}" alt="home" class="w3-image"></a>
        </div>
        <b>Submit a new flower</b>:
        <br></br>
        <div>
            <form method="POST" action="{{action([App\Http\Controllers\SpecificsController::class, 'store']) }}" class="w3-container">
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
                From user:
                <select id="users_id" name="users_id" class="w3-input">
                    <option hidden>Choose User</option>
                    @foreach ($users as $users)
                    <option value="{{ $users->id }}">{{ $users->username }}</option>
                    @endforeach
                </select>
                <br></br>
                <label for="name">Enter the name of the flower: </label>
                <input type="text" name="name" id="name" class="w3-input">
                <br></br>
                <label for="species">Enter the species: </label>
                <input type="text" name="species" id="species" class="w3-input">
                <br></br>
                <label for="color">Enter the color of the flower: </label>
                <input type="text" name="color" id="color" class="w3-input">
                <br></br>
                <label for="bloom_season">Enter the bloom season: </label>
                <input type="text" name="bloom_season" id="bloom_season" class="w3-input">
                <br></br>
                <label for="lenght_mm">Enter the flower lenght in milimeters: </label>
                <input type="text" name="lenght_mm" id="lenght_mm" class="w3-input">
                <br></br>
                <label for="other">(optional) Enter some other fact about this flower: </label>
                <input type="text" name="other" id="other" class="w3-input">
                <br></br>
                <input type="submit" value="Submit your flower" class="w3-btn w3-round-large w3-teal w3-margin">
            </form>
        </div>
    </body>
</html>
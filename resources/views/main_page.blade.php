<!DOCTYPE html>
<html>
    <head>
        <title>Main page</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body style="background-color:#f5f5f5">
        <div style='max-width:5%;max-height:5%;' class="w3-margin">
            <a href="{{URL::to('/')}}"><img src="{{asset('assets/home.png')}}" alt="home" class="w3-image"></a>
            <input type="button" value="Admin login" onclick="goToLogin()" class="w3-btn w3-round-large w3-blue">
        </div>
        <form method="get" class="w3-margin">
            <input name="search" type="text" placeholder="Search by flower name"  class="w3-input w3-border">
            <input type="submit" value="search" class="w3-btn w3-round-large w3-teal w3-margin">
        </form>
        <input type="button" value="Add new user" onclick="addUser()" class="w3-btn w3-round-large w3-teal w3-margin"> </td>
        <input type="button" value="Submit a new flower" onclick="addFlower()" class="w3-btn w3-round-large w3-teal w3-margin"> </td>
        @if (count($flowers) == 0)
            <p color='red'> There are no records in the database!</p>
        @else
            <table class="w3-table-all w3-card-4">
                <tr>
                    <td class="w3-panel w3-teal"> Flower ID </td>
                    <td class="w3-panel w3-teal"> Flower name </td>
                </tr>
                @foreach ($flowers as $flowers)
                    @if ($flowers->id >= 1000)
                    <tr>
                        <td> {{ $flowers->specifics_id }} </td>
                        <td> {{ $flowers->name }} </td>
                        <td style="width: 25%"> <input type="button" value="show details" onclick="showSpecifics({{ $flowers->specifics_id }})" class="w3-btn w3-round-large w3-teal"> </td>
                    </td>
                    @endif
                @endforeach
            </table>
        @endif
        <script>
            function showSpecifics(flowerID) {
                window.location.href = "/flower/" + flowerID;
            }
            function addUser() {
                window.location.href = "/user/user/create";
            }
            function addFlower() {
                window.location.href = "flower/create";
            }
            function goToLogin(){
                window.location.href = "login";
            }
        </script>
    </body>
</html>
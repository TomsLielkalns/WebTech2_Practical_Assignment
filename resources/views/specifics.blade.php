<!DOCTYPE html>
<html>
    <head>
        <title>Flower specifics</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body style="background-color:#f5f5f5">
        <div style='max-width:5%;max-height:5%;' class="w3-margin">
            <a href="{{URL::to('/')}}"><img src="{{asset('assets/home.png')}}" alt="home" class="w3-image"></a>
        </div>
        @if (count($specifics) == 0)
            <p color='red'> There is no flower in the database!</p>
        @else
            <table class="w3-table-all w3-card-4">
                <tr>
                    <td class="w3-panel w3-teal"> Specifics Id </td>
                    <td class="w3-panel w3-teal"> Species </td>
                    <td class="w3-panel w3-teal"> Color </td>
                    <td class="w3-panel w3-teal"> Bloom_season </td>
                    <td class="w3-panel w3-teal"> Lenght_mm </td>
                    <td class="w3-panel w3-teal"> Other </td>
                </tr>
                @foreach ($specifics as $specifics)
                    <tr>
                        <td> {{ $specifics->id }} </td>
                        <td> {{ $specifics->species }} </td>
                        <td> {{ $specifics->color }} </td>
                        <td> {{ $specifics->bloom_season }} </td>
                        <td> {{ $specifics->lenght_mm }} </td>
                        <td> {{ $specifics->other }} </td>
                        <td> <input type="button" value="show comments" onclick="showComments({{ $specifics->id }})" class="w3-btn w3-round-large w3-teal"> </td>
                    </tr>
                @endforeach
            </table>
        @endif
        <script>
            function showComments(flowerID) {
                window.location.href = "/flower/comments/" + flowerID;
            }
        </script>
    </body>
</html>
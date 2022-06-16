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
        <p> <input type="button" value="Add comment" onclick="newComment({{ $flowers_id }})" class="w3-btn w3-round-large w3-teal w3-margin"> </p>
        @if (count($comments) == 0)
            <p color='red'> This flower has no comments!</p>
        @else
            <table class="w3-table-all w3-card-4">
                <tr>
                    <td class="w3-panel w3-teal"> Comment Id </td>
                    <td class="w3-panel w3-teal"> UsersID </td>
                    <td class="w3-panel w3-teal"> FlowersID </td>
                    <td class="w3-panel w3-teal"> Comment </td>
                </tr>
                @foreach ($comments as $comments)
                    <tr>
                        <td> {{ $comments->id }} </td>
                        <td> {{ $comments->users_id }} </td>
                        <td> {{ $comments->flowers_id }} </td>
                        <td> {{ $comments->comment }} </td>
                    </tr>
                @endforeach
            </table>
        @endif
		<script>
			function newComment(flowerID) {
				window.location.href = "/flower/comments/" + flowerID + "/create";
			}
		</script>
    </body>
</html>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if (count($flowers) == 0)
                    <p color='red'> There are no records in the database!</p>
                @else
                    <table class="w3-table-all w3-card-4">
                        <tr>
                            <td class="w3-panel w3-teal"> Flower ID </td>
                            <td class="w3-panel w3-teal"> Flower name </td>
                        </tr>
                        @foreach ($flowers as $flowers)
                            @if ($flowers->id < 1000)
                            <tr>
                                <td> {{ $flowers->specifics_id }} </td>
                                <td> {{ $flowers->name }} </td>
                                <td style="width: 5%"> <input type="button" value="View details" onclick="viewFlower({{ $flowers->id }})" class="w3-btn w3-round-large w3-teal"> </td>
                                <td style="width: 5%"> <input type="button" value="Edit" onclick="editFlower({{ $flowers->id }})" class="w3-btn w3-round-large w3-teal"> </td>
                                <td style="width: 5%"><input type="button" value="approve" onclick="approveFlower({{ $flowers->id }})" class="w3-btn w3-round-large w3-green"></td>
                                <td style="width: 5%">
                                    <form method="POST" action="{{action([App\Http\Controllers\FlowerAdminController::class, 'destroy'], $flowers->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Delete" class="w3-btn w3-round-large w3-red"> 
                                    </form>
                                </td>
                            </td>
                            @endif
                        @endforeach
                    </table>
                @endif
            </div>
        </div>
    </div>
    <script>
        function editFlower(ID) {
            window.location.href = "/admin/" + ID + "/edit";
        }
        function viewFlower(ID){
            window.location.href = "/admin/" + ID + "/view";
        }
        function approveFlower(ID){
            window.location.href = "/admin/" + ID + "/approve";
        }
    </script>
</x-app-layout>

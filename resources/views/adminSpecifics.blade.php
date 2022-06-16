<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
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
                        </tr>
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
    </script>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="{{action([App\Http\Controllers\FlowerAdminController::class, 'update'], $flower->id) }}" class="w3-container">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="flower_id" value="{{ $flower->id }}">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif


                    <label for="image_name">Name: </label>
                    <input type="text" name="flower_name" id="flower_name" class="w3-input" value={{$flower->name}}>
                    <label for="image_name">Species: </label>
                    <input type="text" name="species" id="species" class="w3-input" value={{$specifics->species}}>
                    <label for="image_name">Color: </label>
                    <input type="text" name="color" id="color" class="w3-input" value={{$specifics->color}}>
                    <label for="image_name">Bloom season: </label>
                    <input type="text" name="bloom_season" id="bloom_season" class="w3-input" value={{$specifics->bloom_season}}>
                    <label for="image_name">Lenght in mm: </label>
                    <input type="text" name="lenght_mm" id="lenght_mm" class="w3-input" value={{$specifics->lenght_mm}}>
                    <label for="image_name">Other: </label>
                    <input type="text" name="other" id="other" class="w3-input" value={{$specifics->other}}>

                    <input type="submit" value="save edit" class="w3-btn w3-round-large w3-teal w3-margin">
                </form>
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

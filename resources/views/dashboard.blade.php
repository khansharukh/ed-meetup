<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="participants-panel">
                    <p>Participants</p>
                    @if($participants)
                        <form method="GET" action="{{ route('dashboard') }}">
                            @csrf
                            <div class="mt-4">
                                <label class="block font-medium text-sm text-gray-700" for="search_key">
                                    Search
                                </label>
                                <input class="form-input rounded-md shadow-sm block mt-1 w-full" id="search_key"
                                       type="text" name="key" value="{{ $key_value }}" required/>
                            </div>
                            <div class="mt-4">
                                <label class="block font-medium text-sm text-gray-700" for="select_type">
                                    Select type
                                </label>
                                <select name="type" class="form-input rounded-md shadow-sm block mt-1 w-full" required
                                        id="select_type">
                                    <option>--Select Type--</option>
                                    <option value="1" {{ $selected_type == '1' ? 'selected' : '' }}>Name</option>
                                    <option value="2" {{ $selected_type == '2' ? 'selected' : '' }}>Locality</option>
                                </select>
                            </div>
                            <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 ml-4">
                                Search
                            </button>
                            @if($key_value)
                                <a href="{{ route('dashboard') }}">Reset</a>
                            @endif
                        </form>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Age</th>
                                <th>D.O.B</th>
                                <th>Profession</th>
                                <th>Locality</th>
                                <th>Guests</th>
                                <th>Address</th>
                            </tr>
                            </thead>
                            @foreach ($participants as $participant)
                                <tr>
                                    <td>{{ $participant->name }}</td>
                                    <td>{{ $participant->age }}</td>
                                    <td>{{ $participant->dob }}</td>
                                    <td>{{ $participant->profession }}</td>
                                    <td>{{ $participant->locality }}</td>
                                    <td>{{ $participant->guests }}</td>
                                    <td>{{ $participant->address }}</td>
                                </tr>
                            @endforeach
                        </table>
                        {{ !empty($participants->links()) ? $participants->links() : '' }}
                    @else
                        No data found!!
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

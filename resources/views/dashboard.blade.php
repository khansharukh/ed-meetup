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
                        {{ $participants->links() }}
                    @else
                        No data found!!
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

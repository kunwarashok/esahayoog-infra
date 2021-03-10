<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transcations') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-success table-striped">
                        <thead>
                            <tr>
                                <th scope="col">SN</th>
                                <th scope="col">User Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Email</th>
                                <th scope="col">Image</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($users as $key => $user)
                            <tr>
                                <th scope="row">{{ $key+1}}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->address }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                     @if($user->image)
                                    <img src="{{ asset('images/users'.$user->image) }}" width="100" alt="{{ $user->name.' image' }}">
                                     @endif
                                </td>
                                <td>{{ $user->status}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
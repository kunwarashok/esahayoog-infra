<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3>Our Members</h3>
                    <div class="autoplay">
                        @foreach($entities as $key => $entity)
                        <div>
                            <div class="card">
                                <img src="{{ asset('images/coverImage/'.$entity->coverImage) }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $entity->entityType }}</h5>
                                    <a href="#" class="btn btn-primary">{{ $entity->name }}</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <hr class="stryle1">
                    <br>
                    <table class="table table-dark table-sm text-center">
                        <thead>
                            <tr>
                                <th scope="col">Total Entities</th>
                                <th scope="col">Total Users</th>
                                <th scope="col">Total Transactions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td >{{ $totalEntities }}</td>
                                <td>{{ $totalUsers }}</td>
                                <td>{{ $totalTransactions }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
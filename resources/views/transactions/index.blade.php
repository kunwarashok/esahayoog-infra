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
                                <th scope="col">Donar Name</th>
                                <th scope="col">Entity</th>
                                <th scope="col">Email</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Payment Through</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $key => $transaction)
                            <tr>
                                <th scope="row">{{ $key+1}}</th>
                                <td>{{ $transaction->user->name }}</td>
                                <td>{{ $transaction->entity->name }}</td>
                                <td>{{ $transaction->user->email }}</td>
                                <td>{{ $transaction->amount }}</td>
                                <td>{{ $transaction->paymentMethod}}</td>
                                <td>{{ date('d M Y', strtotime($transaction->created_at)) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Entities') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('account.create', $entityId) }}" class="btn btn-success">Add Account Details</a>
                    <br>
                    <br> @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success')}}
                    </div>
                    @endif @if(Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error')}}
                    </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">SN</th>
                                <th scope="col">Account Type</th>
                                <th scope="col">Account Name</th>
                                <th scope="col">Account Number</th>
                                <th>Action(s)</th>
                            </tr>
                        </thead>
                         @foreach($account as $key => $account)
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td>{{ $account->accountType }}</td>
                                <td>{{ $account->accountName }}</td>
                                <td>{{ $account->accountNumber }}</td>
                                <td>
                                    <a href= "{{ route('account.edit', $account->id) }}" button type="button" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                    <form class="d-inline" action="{{ route('account.destroy', $account->id) }}" method="POST" >
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm btn-delete"><i class="far fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
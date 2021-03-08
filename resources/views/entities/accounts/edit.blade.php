<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Account Detail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form class="validate" action="{{ route('account.update', $account->id) }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label" for="accountType">Account Type:</label >
                            <select class="form-control" name="accountType" id="accountType" >
                                <option value="">Choose Value</option>
                                @foreach($accountTypes as $value)
                                <option
                                 value="{{ $value }} "
                                 @if($value == $account->accountType) selected @endif
                                 
                                 >{{ $value }}</option>
                                @endforeach
                            </select> @error('acountType')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="name">Account Name:</label>
                            <input class="form-control" type="text" id="accountName" name="accountName" value="{{ $account->accountName }}" required> 
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="pno">Account Number:</label>
                            <input class="form-control" type="text" minlength="10" maxlength="16" id="pno" name="accountNumber" value="{{ $account->accountNumber }}" required> 
                            @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                             @enderror
                        </div>

                        <button type="submit" class="btn btn-success">Update Account Details</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
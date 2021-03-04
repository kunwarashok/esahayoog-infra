<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Entity Document') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form class="validate" action="{{ route('account.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        <input type="hidden" name="entityId" value="{{ $entityId }}">
                        <div class="mb-3">
                            <label class="form-label" for="accountType">Account Type:</label >
                            <select class="form-control" name="accountType" id="accountType" required>
                                <option value="">Choose Value</option>
                                @foreach($accountTypes as $value)
                                <option value="{{ $value }}">{{ $value }}</option>
                                @endforeach
                            </select> @error('acountType')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="name">Account Name:</label>
                            <input class="form-control" type="text" id="accountName" name="accountName" required> 
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="pno">Account Number:</label>
                            <input class="form-control" type="text" minlength="10" maxlength="16" id="pno" name="accountNumber" required> 
                            @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                             @enderror
                        </div>

                        <button type="submit" class="btn btn-success">Save Account Details</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
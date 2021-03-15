<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Attach your  National Id') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form class="validate" action="{{ route('document.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        <input type="hidden" name="entityId" value="{{ $entityId }}">
                        <input type="hidden" name="documentType" value="nationalId">
                         <div class="mb-3">
                            <label class="form-label" for="logo">National Id:</label>
                            <br>
                            <input type="file" id="image" name="image[]" multiple accept="image/png, image/jpeg">
                            @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success">Save Document Details</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
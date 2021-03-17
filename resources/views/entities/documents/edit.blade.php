<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit your Documents') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form class="validate" action="{{ route('document.update', $document->id) }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="documentType" value="natonalId">  
                        <div class="mb-3">
                        <label class="form-label" for="documentType">Document Type:</label>
                        <select class="form-control" name="documentType" id="documentType">
                            <option value="">Choose Value</option>
                            @foreach($documentTypes as $value)
                            <option 
                                value="{{ $value }}" 
                                @if($value == $document->documentType) selected @endif
                            
                            >{{ $value }}</option>
                            @endforeach
                        </select> @error('documentType')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="image">Document Image:</label>
                        @foreach($document->documentImages as $documentImage)
                            <img src="{{ asset('images/documents/'.$documentImage->image) }}" width="100" alt="{{ $document->name.' image' }}"><br>
                         @endforeach
                        <input type="file" id="image" name="image[]" multiple accept="image/png, image/jpeg">
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                    </div>

                        <button type="submit" class="btn btn-success">Update Document Details</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
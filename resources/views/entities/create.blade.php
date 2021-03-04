<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Entity') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form class="validate" action="{{ route('entity.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="name">Entity Name</label>
                            <input class="form-control" type="text" id="name" name="name" required> 
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="address">Address:</label>
                            <input class="form-control" type="text" id="address" name="address">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="pno">Contact Number:</label>
                            <input class="form-control" type="text" minlength="10" maxlength="10" id="pno" name="phone" required> 
                            @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                             @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="logo">Logo:</label>
                            <br>
                            <input type="file" id="logo" name="logo" accept="image/png, image/jpeg">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="coverImage">Cover Image:</label>
                            <br>
                            <input type="file" id="coverimage" name="coverImage" accept="image/png, image/jpeg">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="email">Email:</label>
                            <input class="form-control" type="email" id="email" name="email">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="unqname">Unique Name:</label>
                            <input class="form-control" type="text" id="unqname" name="uniqueName"> 
                            @error('uniqueName')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="entityType">Entity Type:</label>
                            <select class="form-control" name="entityType" id="entityType">
                                <option value="">Choose Value</option>
                                @foreach($entityTypes as $value)
                                <option value="{{ $value }}">{{ $value }}</option>
                                @endforeach
                            </select> @error('entityType')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                         </div>
                         <div class="mb-3">
                            <label class="form-label" for="verified">Verified:</label>
                            <input type="radio" id="yes" name="verified" value="1" checked>
                            <label class="form-label" for="male">Yes</label>
                            <input type="radio" id="no" name="verified" value="0">
                            <label class="from-label" for="female">No</label><br>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="status">Status:</label>
                            <input type="radio" id="yes" name="status" value="1" checked>
                            <label class="class-label" for="male">Active</label>
                            <input type="radio" id="no" name="status" value="0">
                            <label class="form-label" for="female">In active</label><br>
                        </div>

                        <button type="submit" class="btn btn-success">Save Entity</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
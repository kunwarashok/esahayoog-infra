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
                    <form action="{{ route('entity.store') }}" method="POST">
                        @csrf
                        <label for="fname">Entity Name:</label>
                        <input type="text" id="fname" name="name"> @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <br><br>
                        <label for="lname">Address:</label>
                        <input type="text" id="lname" name="address"><br><br>
                        <label for="pno">Contact Number:</label>
                        <input type="text" id="pno" name="phone"> @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror<br><br>
                        <label for="logo">Logo:</label>
                        <input type="file" id="logo" name="logo" accept="image/png, image/jpeg">
                        <label for="coverimage">Cover Image:</label>
                        <input type="file" id="coverimage" name="coverImage" accept="image/png, image/jpeg">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email"> @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="unqname">Unique Name:</label>
                        <input type="text" id="unqname" name="uniqueName"> @error('uniqueName')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror<br><br>
                        <label for="entityType">Entity Type:</label>
                        <select name="entityType" id="entityType">
                            <option value="">Choose Value</option>
                            @foreach($entityTypes as $value)
                            <option value="{{ $value }}">{{ $value }}</option>
                            @endforeach
                        </select> @error('entityType')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <br><br>

                        <label for="verified">Verified:</label>
                        <input type="radio" id="yes" name="verified" value="1" checked>
                        <label for="male">Yes</label>
                        <input type="radio" id="no" name="verified" value="0">
                        <label for="female">No</label><br>

                        <label for="status">Status:</label>
                        <input type="radio" id="yes" name="status" value="1" checked>
                        <label for="male">Active</label>
                        <input type="radio" id="no" name="status" value="0">
                        <label for="female">In active</label><br>

                        <button type="submit" class="btn btn-success">Save Entity</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
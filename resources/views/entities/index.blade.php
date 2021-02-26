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
                    <a href="{{ route('entity.create') }}" class="btn btn-success">Add Entity</a>
                    <button type="button" class="btn btn-primary">Primary</button>
                    <br>
                    <br>

                    @if(Session::has('success'))
                    <div class="alert alert-success">
                      {{ Session::get('success')}}
                    </div>
                    @endif

                    @if(Session::has('error'))
                    <div class="alert alert-danger">
                      {{ Session::get('error')}}
                    </div>
                    @endif

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">SN</th>
                            <th scope="col">Entity Name</th>
                            <th scope="col">Type</th>
                            <th scope="col">Logo</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Account Detail</th>
                            <th scope="col" > Document</th>
                            <th scope="col">Action</th> 
                             <th scope="col">Status</th>     
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($entities as $key => $entity)
                            <tr>
                              <th scope="row">{{ $key+1 }}</th>
                              <td>{{ $entity->name }}</td>
                              <td>{{ $entity->entityType }}</td>
                              <td>4K</td>
                              <td>pawanjungshahi@gamil.com</td>
                              <td>9812131415</td>
                              <td>
                                <button type="button" class="btn btn-primary btn-sm"><i class="far fa-eye"></i></button>
                                <button type="button" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button>
                                <button type="button" class="btn btn-success btn-sm"><i class="fas fa-plus"></i></button>
                              </td> 
                              <td>
                                {{-- <a href="#" class="btn btn-primary a-btn-slide-text">
                                  <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                  <span><strong>View </strong></span>            
                              </a>
                              <a href="#" class="btn btn-primary a-btn-slide-text">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                <span style="height: 10em"><strong>  Edit</strong></span>            
                            </a>   --}}
                                <button type="button" class="btn btn-primary btn-sm"><i class="far fa-eye"></i></button>
                                <button type="button" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button>
                                <button type="button" class="btn btn-success btn-sm"><i class="fas fa-plus"></i></button>
                              </td>
                              <td>
                                <button type="button" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button>
                                <button type="button" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                              </td>
                              <td>
                                Verified
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

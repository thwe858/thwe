@extends('layouts.admin')
@section('content')
    <div class="container-fluid px-4">
        <div class="my-3">
            <h1 class="mt-4 d-inline">Items</h1>
            <a href="{{ route('backend.items.create')}}" class="btn btn-primary float-end">Create Item</a>
        </div>
        
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">
                <a href="{{ url('/admin/dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Items</li>
        </ol>

        @if(session('success'))
            <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-1"></i> 
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <script>
                // Wait for the document to load
                setTimeout(function() {
                    var alertElement = document.getElementById('success-alert');
                    if (alertElement) {
                        // Use Bootstrap's built-in fade class
                        alertElement.classList.remove('show');
                        // Remove the element from the page after it fades (600ms)
                        setTimeout(function() {
                            alertElement.remove();
                        }, 600);
                    }
                }, 5000); // 5000ms = 5 seconds
            </script>
        @endif
      
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Items List
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>CodeNo</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Instock</th>
                            <th>Category</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>CodeNo</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Instock</th>
                            <th>Category</th>
                            <th>#</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($items as $key => $item)
                            <tr>
                                {{-- Correct numbering across pagination --}}
                                <td>{{ ($items->currentPage() - 1) * $items->perPage() + $loop->iteration }}</td>
                                <td>{{ $item->code_no }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ number_format($item->price) }}</td>
                                <td>
                                    @if($item->in_stock > 10)
                                        <span class="badge bg-success">{{ $item->in_stock }}</span>
                                    @else
                                        <span class="badge bg-danger">{{ $item->in_stock }}</span>
                                    @endif
                                </td>
                                <td>{{ $item->category->name ?? $item->category_id }}</td>
                                <td>
                                    <a href="{{ route('backend.items.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    
                                        <button type="submit" class="btn btn-sm btn-danger delete" data-id={{$item->id}}>
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                   
                                </td>  
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <div class="mt-3">
                    {{ $items->links() }}
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header bg-danger text-light">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Item</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3>Are you sure you want to Delete</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <form action="" id="deleteForm" method="POST">
                        @csrf
                        @method('delete')
                         <button type="submit" class="btn btn-danger">Yes</button>
                    </form>
                   
                </div>
                </div>
            </div>
            </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('tbody').on('click','.delete',function () {
                //alert('hello');
                let id=$(this).data('id');
                //console.log(id);
                $('#deleteForm').attr('action',`items/${id}`);
                  $('#deleteModal').modal('show');
                
            })
        })
    </script>
@endsection

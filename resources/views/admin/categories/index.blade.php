@extends('layouts.admin')
@section('content')
   <div class="container-fluid px-4">
                       <div class="my-3">
                         <h1 class="mt-4 d-inline">Items</h1>
                         <a href="{{ route('backend.categories.create')}}" class="btn btn-primary float-end">Create Cateogory</a>
                       </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item">
                                <a href="index.html">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Cateogory</li>
                        </ol>
                        @if(session('success'))
                            <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle me-1"></i> 
                                <strong>Success!</strong> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>

                            <script>
                                setTimeout(function() {
                                    var alertElement = document.getElementById('success-alert');
                                    if (alertElement) {
                                        // Use Bootstrap's dismissal method for a cleaner animation
                                        var bsAlert = new bootstrap.Alert(alertElement);
                                        bsAlert.close();
                                    }
                                }, 5000); // Change to 8000 for 8 seconds
                            </script>
                        @endif
                      
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Category List
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th> No</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                          <th> No</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>#</th>
                                        </tr>
                                    </tfoot>
                                   <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{$category->name}}</td>
                                            <td>{{$category->image}}</td>
                                            <td>
                                                <a href="" class="btn btn-sm btn-warning">Edit</a>
                                                <a href="" class="btn btn-sm btn-danger delete" data-id={{$category->id}}> Delete</a>
                                            </td>  
                                        </tr>
                                    @endforeach
                                   </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            <!-- Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header bg-danger text-light">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3>Are you sure you want to delete?</h3>
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
            $('tbody').on('click','.delete',function (e) {
                //alert('hello');
                e.preventDefault();
                let id=$(this).data('id');
                $('#deleteForm').attr('action',`categories/${id}`);
               // console.log(id);
               $('#deleteModal').modal('show');

            })
        })
    
</script>    
@endsection


@extends('layouts.admin')

@section('content')
<div class="container-fluid py-5">
    <div class="row justify-content-center">
        <div class="col-md-6"> 
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header py-3 bg-white border-bottom">
                    <h6 class="m-0 font-weight-bold text-primary">Create New Category</h6>
                </div>
                
                <div class="card-body p-4">
                    <form action="{{ route('backend.categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-4">
                            <label class="form-label font-weight-bold text-dark">Category Name</label>
                            <input type="text" name="name" class="form-control" placeholder="e.g. Phone" required>
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label font-weight-bold text-dark">Category Image</label>
                            <input type="file" name="image" accept="image/*" class="form-control" style="height: auto;" required>
                            <small class="text-muted mt-1 d-block">Recommended size: 800x800px</small>
                        </div>

                       <div class="border-top pt-3">
                            <button type="submit" class="btn btn-primary px-4">Save Category</button>
                            <a href="{{ route('backend.categories.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
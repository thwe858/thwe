@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
        <h1 class="h3 mb-0 text-gray-800">Items</h1>
        <a href="{{ route('backend.items.index') }}" class="btn btn-primary shadow-sm">View All Items</a>
    </div>

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-transparent p-0">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="#">Items</a></li>
        <li class="breadcrumb-item active" aria-current="page">Item Create</li>
      </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-white">
            <h6 class="m-0 font-weight-bold text-dark">
                <i class="fas fa-table mr-1"></i> Posts list
            </h6>
        </div>

        <div class="card-body">
            <form action="{{ route('backend.items.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-4">
                    <label class="text-dark font-weight-bold">Code No</label>
                    <input type="text" name="code_no" class="form-control @error('code_no') is-invalid @enderror" value="{{ old('code_no') }}" placeholder="No-001">
                    @error('code_no')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label class="text-dark font-weight-bold">Item Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Item 3">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label class="text-dark font-weight-bold">Image</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label class="text-dark font-weight-bold">Price</label>
                    <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label class="text-dark font-weight-bold">Discount</label>
                    <input type="number" name="discount" class="form-control @error('discount') is-invalid @enderror" value="{{ old('discount', 0) }}">
                    @error('discount')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label class="text-dark font-weight-bold">InStock</label>
                    <select name="in_stock" class="form-control @error('in_stock') is-invalid @enderror">
                        <option value="yes" {{ old('in_stock') == 'yes' ? 'selected' : '' }}>Yes</option>
                        <option value="no" {{ old('in_stock') == 'no' ? 'selected' : '' }}>No</option>
                    </select>
                    @error('in_stock')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label class="text-dark font-weight-bold">Category</label>
                    <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                        <option value="">Choose Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label class="text-dark font-weight-bold">Description</label>
                    <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="pt-3">
                    <button type="submit" class="btn btn-primary px-5">Save Item</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@extends('layouts.admin')
@section('content')
   <div class="container-fluid px-4">
                       <div class="my-3">
                         <h1 class="mt-4 d-inline">Payments</h1>
                         <a href="{{ route('backend.payments.create')}}" class="btn btn-primary float-end">Create New Payment</a>
                       </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item">
                                <a href="index.html">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Payment</li>
                        </ol>
                      
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Payments List
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th> No</th>
                                            <th> name</th>
                                            <th>logo</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                       <tr>
                                            <th> No</th>
                                            <th> name</th>
                                            <th>logo</th>
                                            <th>#</th>
                                        </tr>
                                    </tfoot>
                                   <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{$item->code_no}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->price}}</td>
                                            <td>{{$item->in_stock}}</td>
                                            <td>{{$item->category_id}}</td>
                                            <td>
                                                <a href="" class="btn btn-sm btn-warning">Edit</a>
                                                <a href="" class="btn btn-sm btn-danger"> Delete</a>
                                            </td>  
                                        </tr>
                                    @endforeach
                                   </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
@endsection
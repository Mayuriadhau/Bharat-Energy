@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>
                    Dashboard</strong></div>
  
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
  
                    <div class="row">
                        <div class="col">
                            <button class="btn">
                                <a href="{{ route('employees.create') }}">Add Employee</a>
                            </button>
                        </div>
                    
                    </div>
                    <div class="container">
                        <div class="row">
                            <table>
                                <tr>
                                    <th>No</th>
                                    <th>Employee name</th>
                                    <th>Department</th>
                                    <th>Age</th>
                                    <th>Salary</th>
                                </tr>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
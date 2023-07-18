@extends('layout')
  
@section('content')
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">

                        <form action="{{ route('employees.store') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="emp_name" class="col-md-4 col-form-label text-md-right">Employee name
                                    </label>
                                <div class="col-md-6">
                                    <input type="text" id="emp_name" class="form-control" name="emp_name"
                                        >
                                    @if ($errors->has('emp_name'))
                                        <span class="text-danger">{{ $errors->first('emp_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="department" class="col-md-4 col-form-label text-md-right">Department</label>
                                <div class="col-md-6">
                                    <select name="department" class="form-control" id="department">
                                        <option value="">Select Department</option>
                                        @foreach($department as $dep)
                                        <option value="{{$dep->id}}">{{$dep->dept_name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('department'))
                                        <span class="text-danger">{{ $errors->first('department') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="age" class="col-md-4 col-form-label text-md-right">Employee age
                                    </label>
                                <div class="col-md-6">
                                    <input type="text" id="age" class="form-control" name="age"
                                        >
                                    @if ($errors->has('age'))
                                        <span class="text-danger">{{ $errors->first('age') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="salary" class="col-md-4 col-form-label text-md-right">Employee salary
                                    </label>
                                <div class="col-md-6">
                                    <input type="text" id="salary" class="form-control" name="salary"
                                        >
                                    @if ($errors->has('salary'))
                                        <span class="text-danger">{{ $errors->first('salary') }}</span>
                                    @endif
                                </div>
                            </div>   

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

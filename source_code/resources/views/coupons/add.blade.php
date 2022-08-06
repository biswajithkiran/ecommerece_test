@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Add Course</div>
                @if ($errors->any())                
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>                        
            @endif
            @if(session('message'))
            <div class="alert alert-success">{{session('message')}} </div>  
            @endif
                <div class="card-body">
                    <div class="card-body">
                        <form action="{{ route('save_product') }}" method="POST" name="form1" id="form1">
@csrf
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Course Name*</label>
                                        <input type="text" name="course_name" id="course_name" class="form-control" placeholder="Course Name">

                                    </div>
                                </div>                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Course Fee*</label>
                                        <input type="text" name="course_fee" id="course_fee" class="form-control" placeholder="Course Fee">
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Description</label>
                                        <textarea  name="description" id="description" class="form-control" placeholder="Description"></textarea>
                                    </div>
                                </div>                            
                                
                            </div>
                            <div class="row clearfix">                                                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Course Status*</label>
                                        <select name="course_status" id="course_status" class="form-control">
                                            <option value="" selected="selected">--Choose--</option>                      
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                            <option value="Deleted">Deleted</option>                                       
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="width: 100%;">Upload Image</label>
                                        <input type="file" name="image" id="image">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="save" name="save" >Save</button>
                            </div>    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
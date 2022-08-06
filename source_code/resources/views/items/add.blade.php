@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Add Product</div>
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
                        <form action="{{ route('save_product') }}" method="POST" name="form1" id="form1" enctype="multipart/form-data">
@csrf
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Item Name*</label>
                                        <input type="text" name="item_name" id="item_name" class="form-control" placeholder="Item Name" value="{{old('item_name')}}">

                                    </div>
                                </div>                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Price*</label>
                                        <input type="text" name="amount" id="amount" class="form-control" placeholder="Amount" value="{{old('amount')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Stock*</label>
                                        <input type="text" name="stock" id="stock" class="form-control" placeholder="Stock" value="{{old('stock')}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Item Status*</label>
                                        <select name="item_status" id="item_status" class="form-control">
                                            <option value="" selected="selected">--Choose--</option>               
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                            <option value="Deleted">Deleted</option>                               
                                        </select>

                                    </div>
                                </div>                                
                            </div>
                            <div class="row clearfix">                                                                    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Description</label>
                                        <textarea  name="description" id="description" class="form-control" placeholder="Description">{{old('description')}}</textarea>
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
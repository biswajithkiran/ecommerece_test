@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Edit Product</div>
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
                        <form action="{{ route('update_product',$arrProduct->id) }}" method="POST" name="form1" id="form1" enctype="multipart/form-data">
@csrf
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Item Name*</label>
                                        <input type="text" name="item_name" id="item_name" class="form-control" placeholder="Item Name" value="{{$arrProduct->item_name}}">

                                    </div>
                                </div>                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Price*</label>
                                        <input type="text" name="amount" id="amount" class="form-control" placeholder="Amount" value="{{$arrProduct->amount}}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row clearfix">  
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Stock*</label>
                                        <input type="text" name="stock" id="stock" class="form-control" value="{{$arrProduct->stock}}" placeholder="Stock">
                                    </div>
                                </div>                                                          
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Item Status*</label>
                                        <select name="item_status" id="item_status" class="form-control">
                                            <option value="" selected="selected">--Choose--</option>                      
                                            <option value="Active" selected="{{$arrProduct->item_status =='Active'? 'selected' : ''}}">Active</option>
                                            <option value="Inactive" selected="{{$arrProduct->item_status =='Inactive'? 'selected' : ''}}">Inactive</option>
                                            <option value="Deleted" selected="{{$arrProduct->item_status =='Deleted'? 'selected' : ''}}">Deleted</option>                                       
                                        </select>

                                    </div>
                                </div>
                                
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Description</label>
                                        <textarea  name="description" id="description" class="form-control" placeholder="Description">{{$arrProduct->description}}</textarea>
                                    </div>
                                </div>                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="width: 100%;">Upload Image</label>
                                        <input type="file" name="image" id="image">
                                    </div>
                                    <?php if($arrProduct->image!='') { ?>
                                    <div>
                                        <img src="{{ url('public/item_images/'.$arrProduct->image) }}"
 style="height: 80px; width: 120px;" class="img-thumbnail">
                                    </div>
                                <?php } ?>
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
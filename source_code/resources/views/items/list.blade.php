@extends('layouts.app')   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Products</div>
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
                    
                        <div class="table-responsive">
                            <table class="table table-striped table-vcenter table-hover mb-0"  id="table_dt">
                                <thead>
                                    <tr> 
                                        <th>#</th>
                                        <th>Item Name</th>
                                        <th>Amount</th>
                                        <th>Stock</th>
                                        <th>Image</th>
                                        <th>Status</th>                                        
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>                
                                    @if(!$arrProducts->isEmpty())
                                    @foreach($arrProducts as $key => $value)
                                    <?php $inc          = $key+1; ?>                                    
                                    <tr id="row{{$value->id}}">
                                      <td style="text-align: center;">{{$inc}}</td>
                                      <td>{{$value->item_name}}</td>
                                      <td>{{$value->amount}}</td>
                                      <td>{{$value->stock}}</td>
                                      <td>
                                        <?php if($value->image!='') { ?>
                                        <img src="{{ url('public/item_images/'.$value->image) }}"  style="height:80px; width: 120px;" class="img-thumbnail">                              
                                        <?php }else { ?>
                                            <img src="{{ url('public/item_images/noimage.png') }}"  style="height:80px; width: 120px;" class="img-thumbnail">
                                        <?php } ?>
                                        </td>
                                      <td>{{$value->item_status}}</td>                                      
                                      <td>{{$value->created_at}}</td>                  
                                      <td style="text-align: center;">
                                        <a class="btn btn-xs bg-green" href="{{ route('edit_product',$value->id) }}" title="Edit" alt="Edit">Edit
                                        <i class="fa fa-pencil-square-o" title="Edit"></i></a>&nbsp;
                                        <a class="btn btn-xs bg-red remove" data-deleteid="{{ $value->id }}" 
                                            href="{{ route('destroy_product',$value->id) }}" 
                                        title="Delete" alt="Delete">Delete<i class="fa fa-trash" aria-hidden="true"></i></a>                              
                                      </td>
                                    </tr>                
                                    @endforeach
                                    @else
                                    <tr><td colspan="8" style="text-align: center;">Sorry.. No records available!!.. </td></tr>
                                    @endif 
                                    </tbody> 
                            </table>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
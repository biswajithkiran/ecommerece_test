@extends('layouts.userapp')   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Products List</div>
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
                                        <th>Product</th>
                                        <th>Amount</th>   
                                        <th>Stock</th>  
                                        <th>Image</th>                                   
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>                
                                    @if(!$arrProducts->isEmpty())
                                    @foreach($arrProducts as $key => $value)
                                    <?php $inc          = $key+1; ?>    
                                    <?php 
                                    if($value->stock==0)
                                        $stock='Out of Stock';
                                    else
                                        $stock=$value->stock;
                                    ?>                                
                                    <tr id="row{{$value->id}}">
                                        <td style="text-align: center;">{{$inc}}</td>
                                        <td>{{$value->item_name}}</td>
                                        <td>{{$value->amount}}</td> 
                                        <td>{{$stock}}</td> 
                                        <td>
                                        <?php if($value->image!='') { ?>
                                            <img src="{{ url('public/item_images/'.$value->image) }}"  style="height:80px; width: 120px;" class="img-thumbnail">                              
                                        <?php }else { ?> 
                                            <img src="{{ url('public/item_images/noimage.png') }}"  style="height:80px; width: 120px;" class="img-thumbnail"><?php } ?>
                                        </td>                                                   
                                        <td style="text-align: center;">
                                        <?php if($stock>1) { ?>
                                        <a class="btn btn-xs bg-green" href="{{ route('buy',$value->id) }}" title="Add to Cart" alt="Add to Cart">Add to Cart
                                        </a>
                                        <?php } else { ?>
                                        <a class="btn btn-xs bg-green" href="#" title="Add to Cart" alt="Add to Cart">Add to Cart
                                        </a>
                                        <?php } ?>
                                        </td>
                                    </tr>                
                                    @endforeach
                                    @else
                                    <tr><td colspan="6" style="text-align: center;">Sorry.. No records available!!.. </td></tr>
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
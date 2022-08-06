@extends('layouts.userapp')   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Cart Details</div>
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
                                        <th>Rate</th> 
                                        <th>Quantity</th>  
                                        <th>Amount</th>                                     
                                        <th>Purchased On</th>
                                    </tr>
                                </thead>
                                <tbody>                
                                    @if(!$arrCart->isEmpty())
                                    @foreach($arrCart as $key => $value)
                                    <?php $inc          = $key+1; ?>  
                                    <?php $amount       = $value->amount*$value->item_count;?>                     
                                    <tr id="row{{$value->id}}">
                                      <td style="text-align: center;">{{$inc}}</td>
                                      <td>{{$value->item_name}}</td>
                                      <td>{{$value->amount}}</td>
                                      <td>{{$value->item_count}}</td>
                                      <td>{{$amount}}</td>                                               
                                      <td>{{$value->created_at}}</td>
                                    </tr>                
                                    @endforeach
                                    @else
                                    <tr><td colspan="5" style="text-align: center;">Sorry.. No records available!!.. </td></tr>
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
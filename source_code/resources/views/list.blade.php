@extends('layouts.userapp')   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">List Students</div>
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
                                        <th>Full Name</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>Email</th>
                                        <th>Contact&nbsp;Number</th>                                        
                                    </tr>
                                </thead>
                                <tbody>                
                                    @if(!$arrStudents->isEmpty())
                                    @foreach($arrStudents as $key => $value)
                                    <?php $inc          = $key+1; ?>                                    
                                    <tr id="row{{$value->id}}">
                                      <td style="text-align: center;">{{$inc}}</td>
                                      <td>{{$value->firstname}}&nbsp;{{$value->firstname}}</td>
                                      <td>{{$value->age}}</td>
                                      <td>{{$value->sex}}</td>
                                      <td>{{$value->emailid}}</td>
                                      <td>{{$value->phone_number}}</td>                                     
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
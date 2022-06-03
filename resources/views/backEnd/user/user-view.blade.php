@extends('backEnd.master')
@section('mainContent')
<div class="row">     
    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
        <div class="card mt-2">
            <h5 class="card-header">User List</h5>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">role</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allData as $key => $data)
                        <tr>
                            <th scope="row">{{++$key}}</th>
                            <td style="font-size :16px;">{{$data->name}}</td>
                            <td style="font-size :16px;">{{$data->email}}</td>
                            <td style="font-size :16px;">{{$data->mobile}}</td>
                            <td style="font-size :16px;">{{$data->role}}</td>
                            <td>
                                <a href="{{route('edit-user',[$data->id])}}" class="btn btn-sm btn-secondary"
                                     title="Edit"><i class="fa fa-edit"></i></a>
                                <a href="{{route('delete-user',[$data->id])}}" class="btn btn-sm btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>        
    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">User {{isset($editData)?'Edit':'Add'}}</h5>
        <div class="card-body">
            <form class="needs-validation" id="myForm" action="{{url(isset($editData)?'update-user':'store-user')}}" 
                novalidate="" method="post">
              <input type="hidden" name="id" value="{{isset($editData)?$editData->id:''}}">
                @csrf
                <div class="row ">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 form-group">
                            
                        <div class="form-group">
                            <input  type="text" class="form-control" id="validationCustom01" 
                                placeholder="Name " name="name" 
                                value="{{isset($editData)? $editData->name:''}}" required="">
                        </div> 
                        <div class="form-group">
                             <input  type="email" class="form-control" id="validationCustom01" 
                            placeholder="Email " name="email"
                            value="{{isset($editData)? $editData->email:''}}" required=""> 
                        </div>
                        <div class="form-group">
                            <input  type="password" class="form-control" id="validationCustom01" 
                                placeholder="Password " name="password"
                                value="{{isset($editData)? $editData->password:''}}" required=""> 
                        </div>
                        <div class="form-group">
                            <select class="form-control form-select" name="role" aria-label="Default select example">
                                <option value="">User Role</option>                             
                                <option value="superadmin"{{($allData[0]->role=="superadmin")?'selected':''}}>Super Admin</option>
                                <option value="admin"{{($allData[0]->role=="admin")?'selected':''}}>Admin</option>
                                <option value="editor"{{($allData[0]->role=="editor")?'selected':''}}>Editor</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input  type="text" class="form-control" id="validationCustom01" 
                            placeholder="Mobile number " name="mobile" 
                            value="{{isset($editData)? $editData->mobile:''}}" required=""> 
                        </div>                                              
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 form-group">
                        <button class="btn btn-primary mt-2" type="submit">{{isset($editData)?'Update':'Submit'}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endSection
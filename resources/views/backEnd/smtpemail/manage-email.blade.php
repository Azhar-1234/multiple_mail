@extends('backEnd.master')
@section('mainContent')




<h1 class="text-center col-md-12">Email Mangment System</h1>
<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">Email {{isset($editData)?'Edit':'Add'}}</h5>
        <div class="card-body">
            <form class="needs-validation" id="myForm" action="{{url(isset($editData)?'update-email':'store-email')}}" novalidate="" method="post">
              <input type="hidden" name="id" value="{{isset($editData)?$editData->id:''}}">
                @csrf
                <div class="row ">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 form-group">
                        <input  type="email" class="form-control" id="validationCustom01" 
                            placeholder="Email" name="email" value="{{isset($editData)? $editData->email:''}}" required="">                        
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 form-group">
                        <button class="btn btn-primary mt-2" type="submit">{{isset($editData)?'Update':'Submit'}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
    <div class="card mt-2">


      <h5 class="card-header">Client Email List</h5>
       <div class="card-body">
    <button class="btn btn-success send-email">Send Email</button>
             <table class="table">
                <thead>
                  <tr>
                     <th scope="col">#</th>
                     <th scope="col">Email</th>
                     <th scope="col">Action</th>
                     <th scope="col"><input type="checkbox" id="checkboxAll"/>All Select<br/></th>
                  </tr>
                </thead>
                    <tbody>
                        @foreach ($allData as $key => $data)
                        <tr>
                            <th scope="row">{{++$key}}</th>
                            <td style="font-size :16px;">{{$data->email}}</td>
                            <td>
                                <a href="{{route('edit-email',[$data->id])}}" class="btn btn-sm btn-secondary"
                                     title="Edit"><i class="fa fa-edit"></i></a>
                                <a href="{{route('delete-email',[$data->id])}}" class="btn btn-sm btn-danger"
                                 title="Delete"><i class="fa fa-trash"></i></a>
                            </td>
                            <td><input type="checkbox" class="checkboxname" name="email[]" value="{{ $data->id }}"></td>
                        </tr>
                        @endforeach
                    </tbody>
             </table>
        </div>
    </div>
</div>   
<script type="text/javascript">
    $(document).ready(function(){
        $('#checkboxAll').click(function(){
            $(".checkboxname").prop('checked',$(this).prop('checked'));
        });
    });

</script>


@endSection
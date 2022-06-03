@extends('backEnd.master')
@section('mainContent')
<div class="row">     
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
        <div class="card mt-2">
            <h5 class="card-header">Designation View</h5>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allData as $key => $data)
                        <tr>
                            <th scope="row">{{++$key}}</th>
                            <td style="font-size :16px;">{{$data->title}}</td>
                            <td>
                                <a href="{{route('edit-designation',[$data->id])}}" class="btn btn-sm btn-secondary"
                                     title="Edit"><i class="fa fa-edit"></i></a>
                                <a href="{{route('delete-designation',[$data->id])}}" class="btn btn-sm btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>        
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">Designation {{isset($editData)?'Edit':'Add'}}</h5>
        <div class="card-body">
            <form class="needs-validation" id="myForm" action="{{url(isset($editData)?'update-designation':'store-designation')}}" novalidate="" method="post">
              <input type="hidden" name="id" value="{{isset($editData)?$editData->id:''}}">
                @csrf
                <div class="row ">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 form-group">
                        <label for="validationCustom01">Designation Title</label>
                        <input  type="text" class="form-control" id="validationCustom01" 
                            placeholder="Enter a designation name " name="title" 
                            value="{{isset($editData)? $editData->title:''}}" required="">                        
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 form-group">
                        <button class="btn btn-primary mt-2" type="submit">{{isset($editData)?'Update':'Submit'}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#myForm').validate({
            rules:{
                title:{
                    required:true,
                },
            },
          messages:{

          },
          errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
          },
          highlight: function(element, errorClass, validClass) {
              $(element).addClass('is-invalid');
            },
          unhighlight: function(element, errorClass, validClass) {
              $(element).removeClass('is-invalid');
            }

        });

    });

</script>

@endSection
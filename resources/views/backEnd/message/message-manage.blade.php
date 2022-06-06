@extends('backEnd.master')
@section('mainContent')
    
<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
    <div class="card mt-2">
        <h5 class="card-header">Message View</h5>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Message</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allData as $key => $data)
                        <tr>
                            <th scope="row">{{++$key}}</th>
                            <td style="font-size :16px;">{!!$data->name!!}</td>
                            <td>
                                <a href="{{route('edit-message',[$data->id])}}" class="btn btn-sm btn-secondary"
                                     title="Edit"><i class="fa fa-edit"></i></a>
                                <a href="{{route('delete-message',[$data->id])}}" class="btn btn-sm btn-danger" title="Delete">
                                    <i class="fa fa-trash"></i></a>
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
        <h5 class="card-header">Message {{isset($editData)?'Edit':'Add'}}</h5>
        <div class="card-body">
            <form class="needs-validation" id="myForm" action="{{url(isset($editData)?'update-message':'store-message')}}" novalidate="" method="post">
              <input type="hidden" name="id" value="{{isset($editData)?$editData->id:''}}">
                @csrf
                <div class="row ">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 form-group">
                          <textarea class="ckeditor form-control" name="name" 
                          >{{isset($editData)? $editData->name:''}}</textarea>                    
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 form-group">
                        <button class="btn btn-primary mt-2" type="submit">{{isset($editData)?'Update':'Submit'}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
    
</script>

@endSection
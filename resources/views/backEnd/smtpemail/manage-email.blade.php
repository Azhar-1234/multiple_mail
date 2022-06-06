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
                    <div class="col-md-12 success-mail p-0" style="display: none;">
                        <div class="alert alert-success">
                          Sent Mail Successfully.
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-12">
    <div class="card mt-2">


      <h5 class="card-header">Client Email List</h5>
       <div class="card-body">
          <button type="button" class="btn btn-primary send-mail btn-sm" disabled="disabled"> <i class="fa fa-share"></i> Send Mail</button>
             <table class="table">
                <thead>
                  <tr>
                     <th scope="col">#</th>
                     <th scope="col">Email</th>
                     <th scope="col">Message</th>
                     <th scope="col">Action</th>
                     <th scope="col"><input type="checkbox" id="checkboxAll"/>All Select<br/></th>
                  </tr>
                </thead>
                    <tbody>
                        @foreach ($emails as $key => $data)
                            <tr>
                                <th scope="row">{{++$key}}</th>
                                <td style="font-size :16px;">{{$data->email}}</td>
                              
                                @foreach ($messageData as $data)
                                    <td style="font-size :16px;">{!!$data->name!!}</td>
                                @endforeach
                                <td>
                                    <a href="{{route('edit-email',[$data->id])}}" class="btn btn-sm btn-secondary"
                                            title="Edit"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('delete-email',[$data->id])}}" class="btn btn-sm btn-danger"
                                        title="Delete"><i class="fa fa-trash"></i></a>
                                </td>
                                <td>
                                    <input type="checkbox" class="checkboxname ckeck_user" name="email[]" value="{{ $data->id }}">
                                </td>

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

      $("input[name='email[]']").change(function () {
          if ($("input[name='email[]']:checked").length > 0) {
            $('.send-mail').removeAttr('disabled');
          }else{
           $('.send-mail').attr('disabled','disabled');
         }
       });

      $('.send-mail').click(function (e) {
          var ids = [];
          e.preventDefault();
          $.each($('input[name="email[]"]:checked'),function(){
              ids.push($(this).data('id'));
          });

          if (ids != '') {
              $(this).attr("disabled", true);
              $(this).html('<i class="fa fa-spinner fa-spin"></i> Send Mail');
              $.ajax({
                  url: '{{ route('send.mail') }}',
                  type: 'POST',
                  data: {
                      _token:$('meta[name="csrf-token"]').attr('content'), 
                      ids:ids
                  },
                  success: function (data) {
                      $('.success-mail').css('display','block');
                      $('.send-mail').attr("disabled", false);
                      $('.send-mail').html('<i class="fa fa-share"></i> Send Mail');
                  }
              });
          }
      });
    });
</script>


@endSection
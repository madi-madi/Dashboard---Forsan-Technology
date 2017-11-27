@extends('admin.layouts.app-admin')


@section('content')
   
 <section class="content" style="min-height: unset;">
 <div class="row">




                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
             

                    <div class="col-md-6 col-md-offset-3">
                        <label for="product_name" class=" control-label"> Product Name </label>
       {!! Form::open([ 'url'=>'/admin-cp/add-new-product','method' =>"post",'files'=> 'true'] ,['class'=>'form-horizontal'  ]) !!}
      
      {!! Form::text('product_name', null , ['class'=>'form-control' ,'placeholder'=>"Exampe : Html5 " ,'id'=>'product_name'])!!}

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('product_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('product_description') ? ' has-error' : '' }}">
                            

                            <div class="col-md-6 col-md-offset-3">
                                <label for="product_description" class=" control-label"> Product Description </label>
                        {!! Form::textarea('product_description',null,['class'=>'form-control' ,'placeholder'=>"Exampe : Html5 " , 'id'=>'product_description'])!!}
                                @if ($errors->has('product_description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('product_description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('product_image') ? ' has-error' : '' }}">
                            

                            <div class="col-md-6 col-md-offset-3">
                                <label for="product_image" class=" control-label"> Product Image </label>
                                
                                {!!Form::file('product_image',['class'=>'form-control', 'id'=>'product_image'])!!}
                                @if ($errors->has('product_image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('product_image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('product_file') ? ' has-error' : '' }}">
                            

                            <div class="col-md-6 col-md-offset-3">
                                <label for="product_file" class=" control-label"> Product File </label>
                                
                                {!!Form::file('product_file',['class'=>'form-control' ,'id'=>'product_file'])!!}
                                @if ($errors->has('product_file'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('product_file') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('product_price') ? ' has-error' : '' }}">
                            

                            <div class="col-md-6 col-md-offset-3">
                                <label for="product_price" class=" control-label"> Product Price </label>
                                
                                {!!Form::number('product_price',null,['class'=>'form-control', 'placeholder'=>'Example: 200 ',  'id'=>'product_price'])!!}
                                @if ($errors->has('product_price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('product_price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                        

                        <div class="form-group{{ $errors->has('product_section') ? ' has-error' : '' }}">
                            

                            <div class="col-md-6 col-md-offset-3">
                                <label for="product_section" class=" control-label"> Product Section</label>
                                
                                {!!Form::select('product_section',[ ''=>'Select Product Section','news'=>'News', 'sport'=>'Sport','article'=>'Article'],null,['class'=>'form-control' , 'id'=>'product_section'])!!}
                                @if ($errors->has('product_section'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('product_section') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('product_status') ? ' has-error' : '' }}">
                            

                            <div class="col-md-6 col-md-offset-3">
                                <label for="product_status" class=" control-label"> Product Status</label>
                                
                                {!!Form::select('product_status',[ ''=>'Select Product Status','enable'=>'Enable', 'disable'=>'Disable'],null,['class'=>'form-control', 'id'=>'product_status'])!!}
                                @if ($errors->has('product_status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('product_status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        <div class="form-group" >
                            <div class="col-md-6 col-md-offset-3">


                                {!!Form::submit('Add Product',['class'=>'btn btn-primary lead add-product form-control', 'style'=>'margin-top:50px;'])!!}
                            </div>
                        </div>
                  
{!!Form::close()!!}
</div>
</section>

@section('footer')

<script type="text/javascript">
    /*
                         var files1;
                     $('input[name="product_image"]').change(function(e){
                            files1 = e.targit.files1;
                     });

                                        // alert(files1);

                     var files2;
                     $('input[name="product_file"]').change(function(e){
                            files2 = e.targit.files2;
                     });


                    jQuery(document).on('click','.add-product', function(event){

                        event.preventDefault();
                         var product_image = $('#product_image').prop('files')[0];
                         var product_file = $('#product_file').prop('files')[0];
                           // alert(_token);
                        
                       // var product_status = document.getElementById("product_status");
                     //   var strUser = e.options[e.selectedIndex].value;
                 //   var product_status= $( "#product_status" ).val();
                     // alert(product_status);
                            var _token = $('meta[name="csrf-token"]').attr('content');
alert(_token);
                            var product_name = $('#product_name').val();
                            var product_description = $('#product_description').val();
                            var product_price = $('#product_price').val();
                            var product_status = $( "#product_status option:selected").val();
                            var product_section = $( "#product_section option:selected").val();
                           var data = new FormData();
                            data.append( _token ,_token);
                            data.append( product_name ,product_name);
                            data.append( product_description ,product_description);
                            data.append( product_price ,product_price);
                            data.append( product_status ,product_status);
                            data.append( product_section ,product_section);
                           // data.append( product_image ,product_image);
                           // data.append( product_file ,product_file);
                           /* $.each(files1 , function(k,v){
                                data.append('product_image',v);
                            });

                            $.each(files2 , function(k,v){
                                data.append('product_file',v);
                            });*/

   /*  jQuery.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});*/

                           /* alert( _token+ ' ' + product_name + ' ' + product_description + ' '+
                            product_price+ ' '+ product_status + ' '+ product_section+ ' ' + product_image +'  /file/ '+ product_file   );
                           */
/*
                    jQuery.ajax({
                        url:url+'/admin-cp/add-new-product',
                        type: 'POST',
                        cache:false,
                        dataType: 'json',
                        data: {_token:_token,test:'<h1>Test</h1>'},
                        contentType:false,//"multipart/form-data",
                        processData:false, 
                        success: function(response){
                           jQuery('body').html(response.data);
                           //alert("Done");
                        },
                    });
                    return false;
                });
</script>
            
@endsection
@endsection
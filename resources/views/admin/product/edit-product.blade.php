@extends('admin.layouts.app-admin')


@section('content')


               
 <section class="content" style="min-height: unset;">
 <div class="row">


                <h1> Edit Product  {{ $product->product_name}}</h1>


              {!!Form::model($product ,['route'=>['product.update' , $product->id ], 
              'method'=>'PATCH' ,"files"=>"true"])!!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
             

                    <div class="col-md-6 col-md-offset-3">
                        <label for="product_name" class=" control-label"> Product Name </label>
    
      
      {!! Form::text('product_name', null , ['class'=>'form-control' ,'placeholder'=>"Exampe : Html5 "])!!}

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
                        {!! Form::textarea('product_description',null,['class'=>'form-control' ,'placeholder'=>"Exampe : Html5 "])!!}
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
                                
                                {!!Form::file('product_image',['class'=>'form-control'])!!}
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
                                
                                {!!Form::file('product_file',['class'=>'form-control'])!!}
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
                                
                                {!!Form::number('product_price',null,['class'=>'form-control', 'placeholder'=>'Example: 200 '])!!}
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
                                
                                {!!Form::select('product_section',[ ''=>'Select Product Section','news'=>'News', 'sport'=>'Sport','article'=>'Article'],null,['class'=>'form-control'])!!}
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
                                
                                {!!Form::select('product_status',[ ''=>'Select Product Status','enable'=>'Enable', 'disable'=>'Disable'],null,['class'=>'form-control'])!!}
                                @if ($errors->has('product_status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('product_status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        <div class="form-group" >
                            <div class="col-md-6 col-md-offset-3">


                                {!!Form::submit('Add Product',['class'=>'btn btn-primary lead form-control', 'style'=>'margin-top:50px;'])!!}
                            </div>
                        </div>
                  
{!!Form::close()!!}
</div>
</section>
@endsection
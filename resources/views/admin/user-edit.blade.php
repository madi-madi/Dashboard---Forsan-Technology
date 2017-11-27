@extends('admin.layouts.app-admin')


@section('content')


                <h1> Edit User  {{ $users->name}}</h1>


              {!!Form::model($users ,['route'=>['users.update' , $users->id ], 
              'method'=>'PATCH' ,"files"=>"true"])!!}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
             

                    <div class="col-md-6 col-md-offset-3">
                        <label for="name" class=" control-label"> User Name </label>
      
      {!! Form::text('name', null , ['class'=>'form-control'])!!}

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('admin') ? ' has-error' : '' }}">
                            

                            <div class="col-md-6 col-md-offset-3">
                                <label for="admin" class=" control-label"> Permation</label>
                                
                                {!!Form::select('admin',[ '0'=>'user', '1'=>'Super Admin','2'=>'Admin'],null,['class'=>'form-control'])!!}
                                @if ($errors->has('admin'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('admin') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            

                            <div class="col-md-6 col-md-offset-3">
                                <label for="email" class=" control-label"> User E-mail</label>
                                
                                {!!Form::email('email',null,['class'=>'form-control'])!!}
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        @if(!isset($users))
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            

                            <div class="col-md-6 col-md-offset-3">
                                <label for="password" class=" control-label"> Password</label>
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            

                            <div class="col-md-6 col-md-offset-3">
                                <label for="password-confirm"class="control-label"> Password Sure </label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        @endif

                        <div class="form-group" >
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-primary lead " style="margin:30px 0px;">
                                   تعديل !
                                </button>
                            </div>
                        </div>
                  
{!!Form::close()!!}


@endsection
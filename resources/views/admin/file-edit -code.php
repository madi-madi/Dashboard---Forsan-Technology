{{ $user->roles->role_name === 'SuperAdmin' ? 'label-warning' : '' }}

class="label @if(Auth::user()->role_id !== 0)  @if($user->roles->role_name === 'SuperAdmin')'label-warning' @else 'label-success' @endif @endif "


                <tr>
                  <td>219</td>
                  <td>Alexander Pierce</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-warning">Pending</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
                <tr>
                  <td>657</td>
                  <td>Bob Doe</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-primary">Approved</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
                <tr>
                  <td>175</td>
                  <td>Mike Doe</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-danger">Denied</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>




                ////// update users

                <h1> Edit User  {{ $users->name}}</h1>


              {!!Form::model($users ,['route'=>['users.update' , $users->id ], 
              'method'=>'PATCH' ,"files"=>"true"])!!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
             

                    <div class="col-md-6 col-md-offset-3">
                        <label for="name" class=" control-label">الاسم </label>
      
      {!! Form::text('name', null , ['class'=>'form-control'])!!}

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
{!!Form::close()!!}



event 

https://stackoverflow.com/questions/36767556/laravel-auth-count-user-login
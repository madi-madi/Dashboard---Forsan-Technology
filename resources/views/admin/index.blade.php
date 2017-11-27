@extends('admin.layouts.app-admin')


@section('content')

    
    <!-- Main content -->
    <section class="content" style="min-height: unset;">
      <!-- Small boxes (Stat box) -->
      <h1> </h1>
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{count($all_product)}}</h3>

              <p>New Product</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Bounce Rate</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3> {{count($allUsers)}} </h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
    <section class="main-content content">
    <!-- table users -->
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Responsive Hover Table</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>ID</th>
                  <th>User</th>
                  <th>E-mail</th>
                  <th>Status</th>
                  <th>Date</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                @foreach($users as $user)
                @if($user->trashed())
                <tr style="background-color: #c74333; color: #fff;">
                @else
                <tr>
                @endif

                  <td>{{$user->id}}</td>
                  <td>{{ucfirst($user->name)}}</td>
                  <td>{{$user->email}}</td>
                 <td><span class="label @if($user->role_id !== 0) 
                  @if($user->roles->role_name === 'SuperAdmin') 
                  label-warning
                   @elseif($user->roles->role_name === 'Admin') 
                   label-success

                    @endif
                   @elseif($user->role_id === 0)
                   label-primary 
                    @endif "> @if($user->role_id !== 0)

                    @if($user->roles->role_name === 'SuperAdmin')
                          {{$user->roles->role_name}}
                    @elseif($user->roles->role_name === 'Admin') 

                        Your {{$user->roles->role_name}}

                    @endif
                    @else
                    Approved
                    @endif

                    </span></td>
                 <td>{{$user->created_at}}</td>
                 <td>
                 @if($user->trashed())
                 <a href="javascript:;" class="btn btn-success" title="Not alowed">Edit</a>
                @else
                <a href="{{url('/user/'.$user->id.'/edit')}}" class="btn btn-success">Edit</a>
                 @endif
                 </td>
                 <td>
                 @if($user->trashed())


                 {!!Form::open(['url' => 'delete-forever/'.$user->id.'/user', 'method'=>'POST'])!!}
                 {!!Form::submit("Delete-forever", ['class'=>'btn btn-danger','title'=>'!! Worning  Cancel'])!!}
                
                 {!!Form::close()!!}
                 <td>
                 {!!Form::open(['url' => 'restore/'.$user->id.'/user', 'method'=>'POST'])!!}
                 {!!Form::submit("Restore", ['class'=>'btn btn-primary'])!!}
                
                 {!!Form::close()!!}   
                 </td>              
                 @else
                 {!!Form::open(['url' => 'delete/'.$user->id.'/user', 'method'=>'DELETE'])!!}
                 {!!Form::submit("Delete", ['class'=>'btn btn-danger'])!!}
                
                 {!!Form::close()!!}
                 @endif
                </tr>
                @endforeach

              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    <!-- end Table users--> 

    </section>

@endsection
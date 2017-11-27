@extends('admin.layouts.app-admin')

@section('header')
{!!Html::style('dist/css/rating.css') !!}
@endsection

@section('content')

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
           <!-- <div id="app1">
              <users></users>
            </div>-->

            <div class="box-body table-responsive no-padding">

           <!-- <template id="users-template">-->
              <table class="table table-hover">
                <tbody><tr>
                  <th>ID</th>
                  <th>User</th>
                  <th>E-mail</th>
                  <th>Status</th>
                  <th>Date</th>
                  <th>Rating</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                @foreach($users as $user)
                @if($user->trashed())
                <tr style="background-color: #c74333; color: #fff;">
                @else
                <tr>
                @endif

                  <td id="user-id">{{$user->id}}</td>
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
    <section class="content-rate" >
        <input type="hidden" name="user_id" id="user_id" value="{{$user->id}}">
        <input type="radio" name="example" class="rating" value="1" />
        <input type="radio" name="example" class="rating" value="2" />
        <input type="radio" name="example" class="rating" value="3" />
        <input type="radio" name="example" class="rating" value="4" />
        <input type="radio" name="example" class="rating" value="5" />
    </section>
                 </td>
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
              <!--</template>-->

            </div>
            <!-- /.box-body -->
            {{ $users->links() }}
          </div>
          <!-- /.box -->

        </div>
      </div>
    <!-- end Table users--> 

    </section>

    @section('footer')
{!!Html::script('js/rating.js') !!}
<script type="text/javascript">

        $(function(){

alert("Done");

            $('.content-rate').rating(function(vote, event){
          var user_id = $(this).find('#user_id').val();
          console.log(user_id);
                $.ajax({
                    method: 'POST',
                    url:'instarting.php',
                    data:{vote:vote},
                }).done(function(info){
                    $('.info').html('Your vote : <b>'+info+'</b>');
                });
            });
        });
 /* 
Vue.componente('users',{

  template: '#users-template'

  data:function(){

    return {

          users: []
    }

  },

  created :function(){

    this.getUsers();

  },

  methods:{

    getUsers:function(){
      $.getJSON("{{route('all-users')}}", function(users){

        this.users = users;
      }).bind(this);
    }
  }
});

new  Vue({
    el:'#app1';
});
*/

</script>
    @endsection



@endsection
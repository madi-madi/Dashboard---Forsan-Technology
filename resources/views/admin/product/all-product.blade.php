@extends('admin.layouts.app-admin')



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
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>ID</th>
                  <th>Aothur ID</th>
                  <th>Product Name</th>
                  <th>Product Description</th>
                  <th>Product Price</th>
                  <th>Product Image</th>
                  <th>Product Section</th>
                  <th>Product Status</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                @foreach($all_product as $product)
                @if($product->trashed())
                <tr style="background-color: #c74333; color: #fff !important; ">
                @else
                <tr>
                @endif
          

                  <td>{{$product->id}}</td>
                 
                  <td >               
                   @if($product->trashed())
                  <a style="color:#fff;" href="{{url('/admin-cp/all-product/user/'.$product->useres->id)}}">
                  @else
                  <a  href="{{url('/admin-cp/all-product/user/'.$product->useres->id)}}">
                    @endif
                   {{ucfirst($product->useres->name)}} </a></td>
                  <td>{{ucfirst($product->product_name)}}</td>
                  <td>{{ucfirst(substr($product->product_description, 0 ,30))}}...</td>
                 <td>{{$product->product_price}}</td>
                 <td><img src="{{url('/uploads/'.$product->product_image)}}" width="50px" height="50px"></td>
                 <td>
                 {{ucfirst($product->product_section)}}
                 </td>
                 <td>
                  {{ucfirst($product->product_status)}} 
                 </td> 
                 <td>
                 {!!Form::open(['url' => '/product/'.$product->id.'/edit', 'method'=>'GET'])!!}
                 {!!Form::submit("Edit", ['class'=>'btn btn-success'])!!}
                 {!!Form::close()!!}
                 </td>
                 <td>
                 @if($product->trashed())


                 {!!Form::open(['url' => 'delete-forever/'.$product->id.'/product', 'method'=>'POST'])!!}
                 {!!Form::submit("Delete-forever", ['class'=>'btn btn-danger','title'=>'!! Worning  Cancel'])!!}
                
                 {!!Form::close()!!}
                 <td>
                 {!!Form::open(['url' => 'restore/'.$product->id.'/product', 'method'=>'POST'])!!}
                 {!!Form::submit("Restore", ['class'=>'btn btn-primary'])!!}
                
                 {!!Form::close()!!}   
                 </td> 
                 @else
                 <td>
                 {!!Form::open(['url' => 'delete/'.$product->id.'/product', 'method'=>'DELETE'])!!}
                 {!!Form::submit("Delete", ['class'=>'btn btn-danger'])!!}
                 {!!Form::close()!!}
                 </td>             
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
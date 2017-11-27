<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Notification;
use App\Role;
use App\Product;
use Auth;


class AdminController extends Controller
{

            public function lang($lang)
            {
                if (in_array($lang, ['en','ar'])) {
                    

                 if (auth::user()) {
                    $user= auth::user();
                    $user->lang = $lang;
                    $user->save();
                     # code...
                 }else{
                    if (session()->has('lang')) {
                        
                        session()->forget('lang');
                    }
                    session()->put('lang',$lang);
                 }
                }else{

                 if (auth::user()) {
                    $user= auth::user();
                    $user->lang = 'en';
                    $user->save();
                     # code...
                 }else{
                    if (session()->has('lang')) {
                        
                        session()->forget('lang');
                    }
                    session()->put('lang','en');
                 }

                }

                return back();
            }




        public function welcome(Request $request){

            if ($request->ajax()) {

                $user = User::find(1)->name;
            
                $data = $user;
               // return $data;// html 
                // if json
                return response()->json(['data'=>$data]);
                # code...
            }
            return view('welcome');
        }


        public function postforsan(Request $request){

            if ($request->ajax()) {

                if ($request->has('test')) {
                    # code...
                    $user = User::find(1)->name;
                    $data = view('data-link', compact('user'))->render();
                }else{
                    $data = $request->input('test');
                }
               // $user = User::find(1)->name;
            

               // $data = $user;
               // return $data;// html 
                // if json
                return response()->json(['data'=>$data]);
                # code...
            }
            return view('welcome');
        }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_product = Product::all();
        //$users = User::with('roles.permissions')->get();
        $allUsers = User::all();
       // $last_login = User::where('remember_token','!=','')->get();
         // $last_login = User::where('deleted_at','<>','')->get();  
       // dd($last_login);

        $users = User::withTrashed()->where('role_id','>',0)->orderBy('id', 'asc')->limit(8)->get();
       // $notifications = Notification::where('notifiable_id', Auth::user()->id)->get();
       // dd($notifications);
       // dd($users);
      //  dd(User::orderBy('created_at', 'desc'));

        return view('admin.index',compact('users','allUsers','all_product'));
    }


    public function addNewProduct()
    {
        //$users = User::with('roles.permissions')->get();

       // $users = User::withTrashed()->where('role_id','>',0)->orderBy('id', 'asc')->limit(8)->get();
       // $notifications = Notification::where('notifiable_id', Auth::user()->id)->get();
       // dd($notifications);
       // dd($users);
      //  dd(User::orderBy('created_at', 'desc'));

        return view('admin.product.add-product');
    }


    /// post  store Product 
    public function storeProduct(Request $request )
    {


       // if ($request->ajax()) {}
            # code...
      // $data = $request->input('test');
      // return response()->json(['data'=>$data]);
          $product_image = $request->file('product_image');
         // dd($product_image);
        //$fileName = $product_image->getClientOriginalName();// name image can found in upload 
          $product_ImageName = time().'.'.$request->product_image->getClientOriginalExtension();
        //$product_image->getSize() // size image |getMimeType();|getRealPath();
        //Move Uploaded File
      $destinationPath = 'uploads';
      $product_image->move($destinationPath,$product_ImageName);


/// retrieve Product Name file 

                $product_file = $request->file('product_file');
         // dd($product_image);
        //$fileName = $product_file->getClientOriginalName();// name image can found in upload 
          $productFileName = time().'.'.$request->product_file->getClientOriginalExtension();
        //$product_file->getSize() // size image |getMimeType();|getRealPath();
        //Move Uploaded File
      $destinationPath = 'uploads/product_file';
      $product_file->move($destinationPath,$productFileName);
            
            /// retrieve Auth User 

      $productUser = Auth::user()->id;
        $storeProduct = [

                    'product_name'=>$request->product_name,
                    'product_deccription'=>$request->product_description,
                    'product_price'=>$request->product_price,
                    'product_file'=>$productFileName,
                    'product_image'=>$product_ImageName,
                    'product_section'=>$request->product_section,
                    'product_status'=>$request->product_status,
                    'user_id'       => $productUser,


            ];
        //dd($storeProduct);
            Product::create($storeProduct);
            return redirect()->back();
             
    }


    //edit product by user 
    public function editProduct($id)
    {
        $product = Product::find($id);
        return view('admin.product.edit-product',compact('product'));        
    }

// update product
    public function updateProduct(Request $request , $id)
    {
        $updateUser = Product::find($id);
        $updateUser->fill($request->all())->save();
        return response(redirect()->back());        
    }

// show all product 
    public function allProduct()
    {
        $all_product = Product::withTrashed()->get();
        return view('admin.product.all-product' , compact('all_product'));
    }

//show all product users
    public function allProductUser($id)
    {
        $user = User::withTrashed()->find($id);
        //dd();
        $all_product_user = $user->product()->withTrashed()->get();;
        return view('admin.product.all-product-user', compact('user','all_product_user'));
    }

    /************************************************

     Section Delete  or Restore Product

    *************************************************/

        // delete products
    public function deleteProduct(Request $request , $id)
    {

        $deleteProduct =Product::find($id);
       // dd($deleteUser);
        $deleteProduct->delete();
        return redirect()->back();
    }


        // restore products
    public function restoreProduct( $id)
    {

        $restoreProduct =Product::onlyTrashed()->find($id);
        $restoreProduct->restore();
        return redirect()->back();
    }

        // delete products for ever from database 
    public function deletforeverProduct($id)
    {
        $deletforeverProduct =Product::onlyTrashed()->find($id);
        $deletforeverProduct->forceDelete();
        return redirect()->back();


    }


// show all users
    public function allUsers()
    {
        //$users = User::with('roles.permissions')->get();
 $usersAdmin = User::withTrashed()->where('role_id','>',0)->orderBy('id', 'asc')->limit(8)->get();

        $users = User::orderBy('id', 'asc')->paginate(8);
       // $notifications = Notification::where('notifiable_id', Auth::user()->id)->get();
       // dd($notifications);
       // dd($users);
      //  dd(User::orderBy('created_at', 'desc'));

        return view('admin.user.all-user',compact('users', 'usersAdmin'));
    }
    public function userData($id)
    {
        $users = User::find($id);
        return response(view('admin.user-edit',compact('users')));
    }

        // update users
    public function updateUser(Request $request , $id)
    {

        $updateUser = User::find($id);
        $updateUser->fill($request->all())->save();
        return response(redirect()->back());
    }

        // delete users
    public function deleteUser(Request $request , $id)
    {

        $deleteUser =User::find($id);
       // dd($deleteUser);
        $deleteUser->delete();
        return redirect()->back();
    }


        // restore users
    public function restoreUser( $id)
    {

        $restoreUser =User::onlyTrashed()->find($id);
        $restoreUser->restore();
        return redirect()->back();
    }

        // delete users for ever from database 
    public function deletforeverUser($id)
    {
        $deletforeverUser =User::onlyTrashed()->find($id);
        $deletforeverUser->forceDelete();
        return redirect()->back();


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

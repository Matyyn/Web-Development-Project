<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Checkoutdetail;
use App\Models\Order;
use App\Models\Vieworder;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function addProduct()
    {
        return view('addProduct');
    }

    public function checkout()
    {
        return view('website.checkout');
    }
    public function home()
    {
        return view('website.home');
    }

    public function cart()
    {
        return view('productList');
    }

    public function mousePad()
    {
        return view('website.mousePad');
    }

    public function showMousePad()
    {
        $data = Product::where('category', 'MousePad')->get();
        return view('website.mousePad', ['products' => $data]);
    }

    public function mouse()
    {
        return view('website.mouse');
    }

    public function showMouse()
    {
        $data = Product::where('category', 'Mouse')->get();
        return view('website.mouse', ['products' => $data]);
    }

    public function headset()
    {
        return view('website.headset');
    }

    public function showHeadset()
    {
        $data = Product::where('category', 'Headset')->get();
        return view('website.headset', ['products' => $data]);
    }

    public function keyboard()
    {
        return view('website.keyboard');
    }

    public function userprofiling()
    {
        return view('website.userprofiling');
    }

    public function aboutus(){
        return view('website.aboutus');
    }


    public function showKeyboard()
    {
        $data = Product::where('category','Keyboard')->get();
        return view('website.keyboard', ['products' => $data]);

    }

    public function show()
    {
        $user_id = Auth::user()->id;
        $products = DB::table('products')
            ->join('carts', 'products_id', "=", 'products.id')
            ->join('users', 'users_id', "=", 'users.id')
            ->select('products.name', 'products.salePrice', 'products.originalPrice', 'products.category','products.id','products.quantity','products.image')
            ->where('users_id', $user_id)->distinct()
            ->get();
        $products = json_decode(json_encode($products), true);
        return view('productList', ['products'=>$products]);
    }



    public function addproductData(Request $req)
    {
        $products = new Product;
        if ($req->hasFile('picture')) {
            $file = $req->file('picture');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/products', $filename);
            $products->image = $filename;
        }
        $products->name = $req->name;
        $products->category = $req->category;
        $products->originalPrice = $req->originalPrice;
        $products->salePrice = $req->salePrice;
        $products->quantity = $req->quantity;
        $products->save();
        if ($products) {
            return back()->with('success', 'You have added product Successfully');
        } else {
            return back()->with('fail', 'product is not added ');
        }
    }

    function details($id){
        $data= Product::find($id);
        return view('details',['products'=>$data]);
    }

    public function addtoCart(Request $req)
    {
        $carts = new Cart;
        $carts->users_id = $req->users_id;
        $carts->products_id = $req->products_id;
        $carts->save();
        return back();
    }

    // function for searchMouse in navbar
    public function searchMouse(Request $req){
        $data = Product::where ('name','like','%'.$req->input('query').'%')->where('category', 'Mouse')->get();
        return view('searched',['products'=>$data]);
    }
    // function for searchMousePad in navbar
    public function searchMousePad(Request $req){
        $data = Product::where ('name','like','%'.$req->input('query').'%')->where('category', 'MousePad')->get();
        return view('searched',['products'=>$data]);
    }
    // function for searchKeyboard in navbar
    public function searchKeyboard(Request $req){
        $data = Product::where ('name','like','%'.$req->input('query').'%')->where('category', 'Keyboard')->get();
        return view('searched',['products'=>$data]);
    }
    // function for searchHeadset in navbar
    public function searchHeadset(Request $req){
        $data = Product::where ('name','like','%'.$req->input('query').'%')->where('category', 'Headset')->get();
        return view('searched',['products'=>$data]);
    }

    //function to view the dashboard
    public function viewdashboard(){
        return view('website.adminDashboard');
    }

    public function viewdashboardData(){
        $products = DB::table('users')
            ->join('orders', 'users.id', "=", 'orders.users_id')
            ->select('users.name','orders.subtotal','orders.id')
            ->get();
            $products = json_decode(json_encode($products), true);
        
        return view('website.adminDashboard',['products'=>$products]);
    }
    
    function deliverOrders($id){
        $del = DB::table('orders')->where('id',$id)->delete();
        return back();    
    }
    public function index(){
        $role = Auth::user()->role;
        if($role =='1'){
            return view('website.adminhome');
        }
        else{
            return view('website.home');
        }
    }
    function removeCart($id){
        $del = DB::table('carts')->where('products_id',$id)->delete();
        $data =Product::find($id);
        $data->quantity=  $id;
        $data->save();
        return back(); 
    }

    //function to change the quantity
    function updateCart(Request $req){
        $data =Product::find($req->id);
        $data->quantity=  $req->quantity;
        $data->save();
        return back();

    }
    public function getproducts(){
        $admin = Product::all();
        return $admin;
    }

    public function deleteAdmin(Request $request){
        $admin = Product::find($request->adminID);
        $admin->delete();
        return back();
    }

    public function check(Request $req){

        $checkoutdetails =  new Checkoutdetail();
        $user_id = Auth::user()->id;
        $checkoutdetails->users_id = $user_id;
        $checkoutdetails->name = $req->name;
        $checkoutdetails->cardNumber = $req->cardNumber;
        $checkoutdetails->expiry = $req->expiry;
        $checkoutdetails->cvv = $req->cvv;
        $checkoutdetails->address = $req->address;
        $checkoutdetails->city = $req->city;
        $checkoutdetails->state = $req->state;
        $checkoutdetails->zipCode = $req->zipCode;
        $checkoutdetails->save();  
        $del=Cart::whereNotNull('id')->delete(); 
        return back();

    }


    function ordernow (Request $req){
        $orders = new Order;
        $orders->users_id = $req->users_id;
        $orders->subtotal = $req->subtotal;
        $orders->save();
        return redirect('checkout');
    }
    
    public function viewstatistic(){
        // Headsets
        $a = DB::select("SELECT COUNT(category) as totalCount1 FROM `products` WHERE category = 'Headset'");
        $count1 = 0;
        foreach($a as $aa){
            $count1 = $aa->totalCount1;
            break;
        }
        // Keyboards
        $b = DB::select("SELECT COUNT(category) as totalCount2 FROM `products` WHERE category = 'Keyboard'");
        $count2 = 0;
        foreach($b as $bb){
            $count2 = $bb->totalCount2;
            break;
        }
        // Mouse
        $c = DB::select("SELECT COUNT(category) as totalCount3 FROM `products` WHERE category = 'Mouse'");
        $count3 = 0;
        foreach($c as $cc){
            $count3 = $cc->totalCount3;
            break;
        }
        // Pads
        $d = DB::select("SELECT COUNT(category) as totalCount4 FROM `products` WHERE category = 'Mousepad'");
        $count4 = 0;
        foreach($d as $dd){
            $count4 = $dd->totalCount4;
            break;
        }
        return view('website.statistic' , compact('count1','count2','count3','count4'));
    }
}

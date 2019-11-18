<?php

namespace App\Http\Controllers;

use App\Bill;
use App\BillDetail;
use App\Cart;
use App\Customer;
use App\Product;
use App\ProductType;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class PageController extends Controller
{
    //
    public function getIndex(){
        //$new_product = Product::where('new',1)->get();
        //$popular_product = Product::where('popular',1)->get();
        return view('page.homepage');
    }

    public function getProductType($type){
        $product_bytype = Product::where('id_type',$type)->get();
        return view('page.product_type', compact('product_bytype'));
    }

    public function getProductDetail($type){
        $product = Product::where('id',$type)->first();
        $other_products = Product::where([
            ['id_type',$product->id_type],
            ['id','<>',$product->id]])->get();

        return view('page.product_detail', compact('product', 'other_products'));
    }

    public function getAboutUs(){
        return view('page.about_us');
    }

    public function getMenu(){
        return view('page.menu');
    }

    public function getContact(){
        return view('page.contact');
    }
    public function getAddtoCart(Request $req, $id)
    {
        $product = Product::find($id);
        $oldCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $req->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function getDelItemCart($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->back();
    }

    public function reduceByOne($id){

        $oldCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        Session::put('cart', $cart);

        return redirect()->back();

    }

    public function getCheckOut(){
        $cart = Session::get('cart');

        return view('page.order', compact('cart'));
    }

    public function postCheckOut(Request $req){

        $cart = Session::get('cart');

        $customer = new Customer;

        $customer->name = $req->name;
        $customer->id_user= Auth::id();
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->note = $req->notes;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $req->notes;
        $bill->save();

        foreach($cart->items as $key=>$value){
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = $value['price']/$value['qty'];
            $bill_detail->save();
        }

        Session::forget('cart');

        return redirect()->back()->with('success','Dat hang thanh cong');


    }

    public function getLogin(){
        return view('login');
    }

    public function getSignup(){
        return view('signup');
    }

    public function postSignup(Request $req){
        try {
            $this->validate($req,
                [
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|min:6|max:20',
                    'fullname' => 'required',
                    're_password' => 'required|same:password'
                ],
                [
                    'email.required' => 'Пожалуйста, введите адрес электронной почты',
                    'email.email' => 'Введите правильный формат электронной почты',
                    'email.unique' => 'У электронной почты уже есть пользователи',
                    'password.required' => 'Пожалуйста, введите пароль',
                    're_password.same' => 'Введите правильный пароль',
                    'password.min' => 'Пароль не менее 6 символов',
                    'password.max' => 'Пароль более 20 символов'
                ]);
        } catch (ValidationException $error) {
        }

        $user = new User();
        $user->full_name = $req->name;
        $user->email = $req->email;
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->password = Hash::make($req->password);
        $user->save();
        return redirect()->back()->with('success','Аккаунт успешно создан');
    }

    public function postLogin(Request $req){
        try {
            $this->validate($req, [
                'email' => 'required|email',
                'password' => 'required|min:6|max:20'
            ],
            [
                'email.required' => 'Пожалуйста, введите адрес электронной почты',
                'email.email' => 'Введите правильный формат электронной почты',
                'password.required' => 'Пожалуйста, введите пароль',
                'password.min' => 'Пароль не менее 6 символов',
                'password.max' => 'Пароль более 20 символов'
            ]);
        } catch (ValidationException $e) {
        }

        $credentials = array('email'=>$req->email, 'password'=>$req->password);
        if(Auth::attempt($credentials)){
            return redirect()->back()->with(['flag'=>'success','message'=>'Войти успешно']);
        }
        else{
            return redirect()->back()->with(['flag'=>'danger','message'=>'Ошибка входа']);
        }
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('homepage');
    }

    public function getSearch(Request $req){
        //dd($req->user()->id);
        $search_product = Product::where('name','like','%'.$req->key.'%')->get();
        return view('page.search', compact('search_product'));
    }

    public function getCartDetail(){
        $cart = Session::get('cart');
        //dd($cart);
        return view('page.cart', compact('cart'));
    }

    public function postCartDetail(){
        return redirect()->back();
    }


    public function getOrderDetail($id){

        $bill = Bill::find($id);

        $bill_detail = BillDetail::where('id_bill', $id)->get();
        $product = Product::all();
        return view('admin.order_detail',compact('bill_detail', 'product', 'bill'));
    }

    public function getUserList(){
        $user = User::get();
        return view('admin.user_list',compact('user'));
    }

    public function getFoodList(){
        $food = Product::get();
        return view('admin.food_list',compact('food'));
    }

    public function getAddFood(){
        $food_type = ProductType::get();
        //dd($food_type);
        return view('admin.add-food', compact('food_type'));
    }

    public function postAddFood(Request $req){
        try {
            $this->validate($req,
                [
                    'name' => 'required|unique:products,name',
                    'picture' => 'required|unique:products,image',
                    'id_type' => 'required',
                    'description' => 'required',
                    'unit_price' => 'required',
                    'promotion_price' => 'required',
                    'new' => 'required',
                    'popular' => 'required'

                ],
                [
                    'name.required' => 'Пожалуйста, введите адрес электронной почты',
                    'picture.required' => 'Введите правильный формат электронной почты',
                    'id_type.required' => 'У электронной почты уже есть пользователи',
                    'description.required' => 'Пожалуйста, введите пароль',
                    'unit_price.required' => 'Введите правильный пароль',
                    'promotion_price.required' => 'Пароль не менее 6 символов',

                ]);
        } catch (ValidationException $error) {
        }

        $food = new Product();
        $food->name = $req->name;
        $food->image = $req->picture;
        $food->description = $req->description;
        $food->unit_price = $req->unit_price;
        $food->promotion_price = $req->promotion_price;
        $food->unit = $req->unit;
        $food->id_type = $req->id_type;
        $food->new = $req->new;
        $food->popular = $req->popular;

        $food->save();
        return redirect()->back()->with('success','Thanh cong');
    }

    public function getListOrder($id){
        if ($id == 9):
            $customer = Customer::all();
            $user = User::all();

        else:
            $customer = Customer::where('id_user', $id)->get();
            $user = User::where('id',$id)->get();
        endif;
        $bill = Bill::all();


        return view('admin.list_order', compact('bill', 'customer','user'));
    }

    public function getEditFood($id){
        $product = Product::where('id',$id)->first();
        $product_type = ProductType::where('id',$product->id_type)->first();
        $type = ProductType::where('id','!=', $product_type->id_type)->get();
        return view('admin.food_edit', compact('product', 'product_type','type'));
    }

    public function postEditFood(Request $req, $id){
        $food = Product::find($id);
        $food->name = $req->name;
        $food->image = $req->picture;
        $food->description = $req->description;
        $food->unit_price = $req->unit_price;
        $food->promotion_price = $req->promotion_price;
        $food->unit = $req->unit;
        $food->id_type = $req->id_type;
        $food->new = $req->new;
        $food->popular = $req->popular;

        $food->save();
        return redirect()->back()->with('success','Thanh cong');

    }

    public function getDelFood($id){
        $food = Product::find($id);
        $food->forceDelete();
        return redirect()->back();
    }


}

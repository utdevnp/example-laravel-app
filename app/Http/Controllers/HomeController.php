<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ValidateRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // $items = [7, 4, 8, 10, 1, 2, 2, 3, 4];

        // echo " return an array unique value <br>";
        // print_r(array_unique($items));
        
        // echo "<hr> return an array with ascending order value.<br>";
        // sort($items);
        // $length = count($items);
        // for($x = 0; $x < $length; $x++) {
        //     echo $items[$x];
        // }


        // echo "<hr> return max value <br>";
        // echo max($items);

        // echo "<hr> return sum of the array value <br>";
        // echo array_sum($items);

        // echo "<hr> find the second max value of the array. <br>";
        // echo $this->secondMaxValue($items);
            


        $data['items']= Item::get();
        return view('home',$data);
    }



    // function secondMaxValue($arr)
    // {
    //     sort($arr, SORT_NUMERIC);

    //     return($arr[count($arr) - 2]);
    // }
    

    public function createItem(){
        return view("additem");
    }

    public function storeItem(Request $request){
        
        $save = Item::create($request->all());
        
        if($save){
            return redirect()->route("home");
        }else{
            return  redirect()->route("createItem");
        }

    }


    public function placeOrder(Request $request){
      
        for ($i = 1; $i < count($request->item); $i++) {
            $orderItems[] = [
                'user_id' => Auth::id(),
                'item_id' => $request->item[$i],
                'quantity' => $request->quantity[$i],
                'total'=> $request->rate[$i] * $request->quantity[$i],
                "rate"=> $request->rate[$i]
            ];
        }

        OrderItem::insert($orderItems);
        request()->session()->flash('message', 'Your order placed');
        return redirect()->route("home");
     
    }


    function apiValidation(ValidateRequest $request){

        $formData = $request->all();
        $validated = $request->validated();

        if(! $validated){
            $data = [
                "status"=>false,
                'message' => 'validation error',
                "data"=>$validated
            ];
            return response()->json($data, 200);
        }

        $data = [
                'status' => 'true',
                'message' => 'Data insert successful.',
                "data"=>"" // send the data,
                
        ];
        return response()->json( $data, 200);


    }
}

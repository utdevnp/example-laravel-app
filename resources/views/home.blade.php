@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <b> {{ __('Welcome ! ') }} </b>  {{Auth::user()->name}} <br>
                   <b> {{__("Api Token:")}} </b> {{Auth::user()->api_token}}
                </div>
            </div>
        </div>
        @if (request()->session()->has('message')) 
            <div class="col-md-6 mt-2">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{request()->session()->get('message')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif

        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header">
                    <p>Item List</p>

                </div>

                <div class="card-body">
                    <form method="post" action="{{route("placeOrder")}}">
                        @csrf
                        <table class="table table-bordered">
                            <tr>
                            <td> </td>
                                <td>Item Name </td>
                                <td>Amount</td>
                                <td>Quantity</td>
                                <td>Description</td>
                            </tr>
                            @foreach($items as $item)
                                <tr>
                                    <td><input type="checkbox" name="item[]" value="{{$item->id}}"></td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->amount}}</td>
                                    <td>
                                        <input type="hidden" name="rate" value="{{$item->amount}}"/>
                                    <select name="quantity[]">
                                        @for($i=1; $i<=$item->quantity; $i++)
                                            <option value="{{$i}}">{{$i}} </option>
                                        @endfor
                                    </selecct>    
                                   </td>
                                    <td>{{$item->detail}}</td>

                                </tr>
                            @endforeach
                        </table>

                        <button type="submit" class="btn btn-success float-right">Place Order</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

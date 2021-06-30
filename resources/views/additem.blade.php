@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Add New Item') }}</div>

                <div class="card-body">
                <form method="post" action="{{route("storeItem")}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Item Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Amount</label>
                        <input type="number" class="form-control"  name="amount">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Quantity</label>
                        <input type="number" class="form-control"  name="quantity">
                    </div>
                    
                  
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description</label>
                        <textarea class="form-control" name="detail" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Save </button>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

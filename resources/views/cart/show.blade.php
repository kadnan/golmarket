@extends('layout.master')
@section('content')
    <div class="row margin-top">
        <div class="col-md-11 col-md-offset-1">
            <table class="table">
                <thead>
                <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php $qty = 0; ?>
                    @foreach($entries as $entry)
                        <?php $qty = $qty + $entry->price; ?>
                        <tr>
                            <td>1</td>
                            <td>{!! $entry->product_name !!}</td>
                            <td>{!! $entry->price !!}</td>
                            <td>{!! $entry->qty !!}</td>
                            <td><a href="/delete/{!! $entry->id !!}">Delete</a></td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" align="right">
                           <strong>Total:</strong> {!! $qty !!}
                            <button class="btn btn-primary">Checkout</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@stop
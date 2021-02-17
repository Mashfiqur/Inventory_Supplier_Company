@extends('layouts.people')
@section('options')
<li><a href="{{ url('/people') }}"><i class="lni lni-dashboard"></i><span>Dashboard</span></a></li>
<li><a href="{{ url('/people/orders') }}"><i class="lni lni-forward"></i><span>Orders</span></a></li>
<li><a href="{{ url('/people/products') }}"><i class="lni lni-producthunt"></i><span>Products</span></a></li>
@endsection
@section('content')
<!-- Content -->
<div class="main">
    <div class="row py-3">
        <div class="col-md-10"></div>
        <div class="col-md-2">
            <a class="btn btn-sm btn-primary" href="{{ url('/people/order/create') }}" ><i class="lni lni-plus"></i> New Order</a>


        </div>
    </div>

    <section class="mx-4">
        <table class="table ">
            <thead class="thead-dark ">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Products</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @isset($orders)
                @foreach($orders as $order)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $order['name'] }}</td>
                    <td>@if($order['created_at'] ) @php echo e(date('Y-m-d h:i:s A', strtotime($order['created_at']))); @endphp @else N/A @endif</td>
                    <td>
                        <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#viewModal{{ $order['id']}}">View</button>
                        <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editModal{{ $order['id']}}">Edit</button>
                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{ $order['id']}}">Delete</button>

                        <!-- Modal -->
                        <div class="modal fade" id="viewModal{{ $order['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Order Details</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="row container">
                                            <h5>Name: <span class="text-info">{{ $order['name'] }}</span></h5>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- Edit Modal -->
                        <!-- Modal -->
                        <div class="modal fade" id="editModal{{ $order['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Order</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('/order/update')}}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <input type="text" class="form-control" name="id" value="{{ $order['id'] }}" aria-describedby="emailHelp" hidden>

                                                <label for="exampleInputEmail1" class="form-label font-weight-bold">SKU(Stock Keeping Unit)</label>
                                                <input type="text" class="form-control" name="name" value="{{ $order['name'] }}" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                <div id="emailHelp" class="form-text"></div>
                                            </div>



                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <!-- Delete Modal -->

                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal{{ $order['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Delete Order</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('/order/delete')}}" method="POST">
                                            @csrf
                                            <input type="text" class="form-control" name="id" value="{{ $order['id'] }}" aria-describedby="emailHelp" hidden>

                                            <div class="mb-3">
                                                <h5>Are you sure want to delete this product?</h5>

                                            </div>



                                    </div>


                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
</div>

</td>
</tr>


@endforeach


@endisset
</tbody>
</table>


</section>
</div>

@endsection
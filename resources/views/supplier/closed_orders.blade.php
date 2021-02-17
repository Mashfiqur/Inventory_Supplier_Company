@extends('layouts.people')
@section('options')
<li><a href="{{ url('/supplier') }}"><i class="lni lni-dashboard"></i><span>Dashboard</span></a></li>
<li><a href="{{ url('/supplier/open-orders') }}"><i class="lni lni-forward"></i><span>Open Orders</span></a></li>
<li><a href="{{ url('/supplier/closed-orders') }}"><i class="lni lni-coin"></i><span>Closed Orders</span></a></li>

@endsection
@section('content')
<!-- Content -->
<div class="main pt-4">


    <section class="mx-4">
        <table class="table ">
            <thead class="thead-dark ">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Company</th>
                    <th scope="col">Products</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Dispatched At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @isset($closed_orders)
                @foreach($open_orders as $order)
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
                                        <h5 class="modal-title" id="exampleModalLongTitle">Product Details</h5>
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
                                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Product</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('/product/update')}}" method="POST">
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
                                        <h5 class="modal-title" id="exampleModalLongTitle">Delete Product</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('/product/delete')}}" method="POST">
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

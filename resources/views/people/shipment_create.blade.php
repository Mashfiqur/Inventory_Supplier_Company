@extends('layouts.people')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('options')
<li><a href="{{ url('/people') }}"><i class="lni lni-dashboard"></i><span>Dashboard</span></a></li>
<li><a href="{{ url('/people/orders') }}"><i class="lni lni-forward"></i><span>Orders</span></a></li>
<li><a href="{{ url('/people/products') }}"><i class="lni lni-producthunt"></i><span>Products</span></a></li>
@endsection
@section('content')

<div class="container py-5">

    <div class="row pt-5 pb-2 ">
        <h5 class=" mx-auto"> Create a New Order</h5>
    </div>
    <form action="{{ url('/order/create')}}" method="POST" id="order_form">
        @csrf
        <div class="row mb-1">
            <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label font-weight-bold">Name</label>
                <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">

            </div>
            <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label font-weight-bold">Supplier</label>
                <select name="supplier" id="supplier" required>
                    <option value="">Select Supplier</option>
                    @isset($suppliers)
                    @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach

                    @endisset


                </select>
            </div>

        </div>
        <hr>

        <div class="row mb-2">


            <div class="col-md-4">
                <label for="sku">SKU</label>
                <select class="form-control  ml-2" id="add_sku">


                    @isset($products)
                    <option value="" disabled selected>Choose Your Product</option>

                    @foreach($products as $product)
                    <option value="{{$product['id']}}">{{$product['sku']}}</option>
                    @endforeach
                    @endisset
                </select>
            </div>
            <div class="col-md-3">
                <label for="discount">Quantity</label>
                <input class="form-control ml-3 " type="number" step="1" id="quantity" autocomplete="off" placeholder="Quantity">
            </div>




            <div class="col-md-5 mt-4 text-center">
                <button type="button" id="delete_product" class="btn btn-sm btn-danger" title="Delete Selected Items"><i class="lni lni-trash"></i> Delete Product</button>

                <button type="button" id="add_product" class="btn btn-sm btn-primary"><i class="lni lni-plus"></i>Add Product</button>
            </div>

        </div>

        <div class="row">


            <table class="table table-bordered mx-2" id="product_list">
                <thead>
                    <th>Select</th>
                    <th>Item</th>
                    <th>Quantity</th>

                </thead>

                <tbody id="order_products">

                </tbody>

            </table>
        </div>

</div>

</div>
<div class="row">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection


@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $("#add_product").click(function() {
            var sku = $("#add_sku").val();
            var quantity = $("#quantity").val();

            var markup = "<tr><td><input type='checkbox' name='record'></td><td>" + sku + "</td><td>" + quantity + "</td><td>" + "</tr>";
            $("#order_products").append(markup);
            $("#add_sku").val('')
            $("#quantity").val('')


        });

        // Find and remove selected table rows
        $("#delete_product").click(function() {
            $("table tbody").find('input[name="record"]').each(function() {
                if ($(this).is(":checked")) {
                    $(this).parents("tr").remove();
                }
            });
        });
    });


    // Initialize select2
    $("#add_sku").select2();
    $(document).ready(function() {

        // Read selected option
        $('#add_sku').keyup(function() {
            var add_sku = $('#add_sku option:selected').text();
            var id = $('#add_sku').text();

        });

    });


    $('form#order_form').submit(function() {
        var arrData = [];
        // loop over each table row (tr)
        $("#product_list tr").each(function() {
            var currentRow = $(this);

            var col2_value = currentRow.find("td:eq(1)").text();
            var col3_value = currentRow.find("td:eq(2)").text();
            var col4_value = currentRow.find("td:eq(3)").text();
            var col5_value = currentRow.find("td:eq(4)").text();

            var obj = {};
            obj.item = col2_value;
            obj.quantity = col3_value;
           
            arrData.push(obj);
        });
        arrData.shift();
        console.log(arrData);
        var Items = JSON.stringify(arrData)

        $("<input />").attr("type", "hidden")
            .attr("name", "ItemArray")
            .attr("value", Items)
            .appendTo('form#order_form');
        return true;
    });
</script>
@endsection
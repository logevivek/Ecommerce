
@extends('front.layout.app_other')  
@section ('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="front/assets/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="index">Home</a>
                            <span>Cart Page</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table cart-items">
                        <table id="cart" class="table table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th>Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0 @endphp
                                @if(session('cart'))
                        
                                @foreach(session('cart') as $id => $details)
                                    @php $total += $details['product_price'] * $details['quantity'] @endphp

                                <tr data-id="{{ $id }}">
                                    <td data-th="Product">
                                        <img src="{{asset('backend/images/'.$details['product_image'] )}}" width="100" height="100" class="img-responsive">
                                        <h5>{{ $details['product_name'] }}</h5>
                                    </td>

                                    <td data-th="Price">
                                        &#8377;{{ $details['product_price'] }}
                                    </td>
                              

                                 @if( $details['quantity'] == 0)
                                 <td data-th="Quantity">
                                    <div class="pro-qty">
                                        <button class="btn btn-danger">Out of stock</button>
                                    </div>
                                </td>

                                  
                                  @else
                                        
                                  <td data-th="Quantity">
                                    <div class="pro-qty">
                                        <input type="number" min="1" value="{{ $details['quantity'] }}" id="disabledSearch" class="qty update-cart" />
                                    </div>
                                </td>
                                  @endif

                                    <input type="hidden" class="hidden-quantity" value="{{ $details['tbl_qty'] }}">
                                 
                                    <td data-th="Subtotal">
                                        &#8377;{{ $details['product_price'] * $details['quantity'] }}
                                    </td>
                                    
                                    <td class="actions" data-th="">
                                        <button class="btn btn-danger btn-sm remove-from-cart" title="Delete Product"><i class="fa fa-trash-o"></i></button>
                                    </td>
                             </tr>
                             @endforeach

                             @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="shop" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    </div>
                </div>
      
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Grand Total <span>&#8377; {{ $total }} /-</span></li>
                        </ul>
                        <a href="checkout" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript">
        //  $(document).on('change', '.update-cart', function (e) {
        //     e.preventDefault();
        //     var ele = $(this);
        //     var quantity = parseInt(ele.parents("tr").find(".qty").val());
        //     var hiddenQuantity = parseInt(ele.parents("tr").find(".hidden-quantity").val());
        //         if (quantity > hiddenQuantity) {
        //         Swal.fire({
        //             text: "Quantity cannot exceed available stock (" + hiddenQuantity + ").",
        //             confirmButtonText: 'OK'
        //         });
        //         // $("#disabledSearch").prop("disabled", true);
        //         return;
        //     }

        //     $.ajax({
        //         url: '{{ route('update.cart') }}',
        //         method: "patch",
        //         data: {
        //             _token: '{{ csrf_token() }}',
        //             id: ele.parents("tr").attr("data-id"),
        //             quantity: quantity
        //         },
        //         success: function (data) {
        //             $('.cart-items').load(location.href + " .cart-items");
        //         },

        //         error: function (xhr) {
                
        //             alert('An error occurred: ' + xhr.responseText);
        //         }

        //     });
        // });
            $(document).on('change', '.update-cart', function (e) {
            e.preventDefault();
            var ele = $(this);
            var quantityInput = ele.parents("tr").find(".qty");
            var quantity = parseInt(quantityInput.val());
            var hiddenQuantity = parseInt(ele.parents("tr").find(".hidden-quantity").val());

            if (quantity > hiddenQuantity) {
                // Set the input value to hiddenQuantity
                quantityInput.val(hiddenQuantity);

                // Optionally show a SweetAlert message
                Swal.fire({
                    text: "Quantity has been set to available stock (" + hiddenQuantity + ").",
                    confirmButtonText: 'OK'
                });

                return;
            }

            $.ajax({
                url: '{{ route('update.cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: quantity
                },
                success: function (data) {
                    $('.cart-items').load(location.href + " .cart-items");
                },
                error: function (xhr) {
                    alert('An error occurred: ' + xhr.responseText);
                }
            });
        });


        //Remove Product From Cart
        $(document).on('click', '.remove-from-cart', function(e) {
        e.preventDefault();
        var ele = $(this);
        // SweetAlert confirmation
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to delete this product!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '{{ route('remove.from.cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}', 
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function(response) {
                        $('.cart-items').load(location.href + " .cart-items");
                        Swal.fire(
                            'Deleted!',
                            response.status,
                            'success'
                        );
                    },
                });
            }
        });
    });
</script>
@endsection

@section('title')
Cart Page
@endsection







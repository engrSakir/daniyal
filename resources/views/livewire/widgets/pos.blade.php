<div wire:ignore>
    <div class="row noselect">
        <style>
            .item_box {
                height: 415px;
                overflow: auto;
            }

            .calculation_box {
                height: 440px;
                overflow: auto;
            }

            .food_item{
                background-color: rgba(128, 128, 128, 0.212);
                border-style: dotted;
                box-shadow:0px 0px 0px 1px yellow inset;
                border-radius: 8px;
                cursor: pointer;
            }

            .food_item div{
                margin: 3px;
            }

            .food_item:hover {
                background-color: rgba(255, 255, 0, 0.808);
            }

            .noselect {
                -webkit-touch-callout: none; /* iOS Safari */
                    -webkit-user-select: none; /* Safari */
                    -khtml-user-select: none; /* Konqueror HTML */
                    -moz-user-select: none; /* Old versions of Firefox */
                        -ms-user-select: none; /* Internet Explorer/Edge */
                            user-select: none; /* Non-prefixed version, currently
                                                supported by Chrome, Edge, Opera and Firefox */
            }

            /* Chrome, Safari, Edge, Opera */
            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
            }

            .form-group {
                margin-bottom: 0rem;
            }
        </style>

        <div class="col-7">
            <div class="card">
                <div class="card-header text-white d-flex justify-content-between">
                    <input type="text" class="form-control item_search_by_id_field form-control-sm" placeholder="Item ID">
                </div>
                <div class="card-body item_box">
                    <div class="row">
                        @foreach ($items as $item)
                        <div class="col-3 food_item item item_id_{{ $item->id }}">
                            <div @if($item->category_wise_items_count == 1) onclick="add_to_basket({{ $item->category_wise_items()->first()->id }})"
                                @else
                                data-toggle="modal" data-target="#category_wise_items_modal"
                                onclick="category_wise_items_modal_open({{ $item->id }}, '{{ $item->name }}')"
                                @endif>
                                <img class="rounded mx-auto d-block" height="40px;" style="" src="{{ asset($item->image ?? 'assets/images/food-icon.png') }}">
                                <div class="text-center">
                                    <p class="" style="font-size: 12px; color:black;">{{ $item->name }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-5">
            <div class="card">
                <div class="calculation_box">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="form-header text-uppercase text-center mt-1" id="total_price">00.00 টাকা</h4>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <select class="custom-select custom-select-sm" id="waiter">
                                        <option value="">Select Waiter</option>
                                        @foreach ($waiters as $waiter)
                                        <option value="{{ $waiter->id }}">{{ $waiter->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <select class="custom-select custom-select-sm" id="table">
                                        <option value="">Select Table</option>
                                        @foreach ($tables as $table)
                                        <option value="{{ $table->id }}">{{ $table->name }}</option>                                            
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="zmdi zmdi-phone"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control form-control-sm" placeholder="Phone Number" id="phone">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="zmdi zmdi-pin-drop"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control form-control-sm" placeholder="Delivery Address" id="address">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="zmdi zmdi-favorite-outline"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control form-control-sm" placeholder="Discount Percentage" id="discount_percentage">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" value="0" id="parcel_check">
                                            </div>
                                        </div>
                                        <input type="text" class="form-control form-control-sm" id="delivery_charge" placeholder="Delivery Charge">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover mt-1 table-sm">
                        <thead class="bg-info text-white">
                            <tr>
                                <td>#</td>
                                <td>Name</td>
                                <td style="text-align: right;">Price</td>
                                <td style="text-align: center;">QT</td>
                                <td style="text-align: right;">Total</td>
                                <td style="text-align: right;">Action</td>
                            </tr>
                        </thead>
                        <tbody id="basket_table">

                            {{-- add by jquery --}}

                        </tbody>
                    </table>
                </div>
                <button type="button" class="btn btn-primary btn-sm btn-block" id="save_btn" style="width: 100%;" onclick="save_invoice()">SAVE</button>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="category_wise_items_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="category_wise_items_modal_title">{{-- Set by jQuery --}}</h5>
                        <button type="button" class="close text-white bg-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body item-card" id="category_wise_items_modal_body">
                        ...
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->

        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('assets/printjs/print.min.js') }}"></script>
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/printjs/print.min.css') }}">
        <script>
            var items = {!! $items !!};
            var category_wise_items = {!! $category_wise_items !!};
            var sub_categories = {!! $sub_categories !!};

            basket = [];

            // check_from_basket(basket, category_wise_item_id) [0].. for data and [1] for array key
            function category_wise_items_modal_open(item_id, item_name) {
                $("#category_wise_items_modal_title").text(item_name);
                let modal_item_html = '';
                $.grep(category_wise_items, function(category_wise_item) {
                    if(category_wise_item.item_id == item_id){
                        let sub_category_name = null;
                        if(category_wise_item.sub_category_id){
                            $.grep(sub_categories, function(sub_category) {
                                if(sub_category.id == category_wise_item.sub_category_id){
                                    modal_item_html += '<button type="button" class="btn btn-primary m-1" onclick="add_to_basket('+category_wise_item.id+')">'+ sub_category.name +' = '+ category_wise_item.price +' TAKA </button>';
                                }
                            });
                        }
                    }
                });
                $("#category_wise_items_modal_body").html(modal_item_html);
            }

            function get_item_details_by_category_wise_item_id(category_wise_item_id) {
                let item_info = [];
                item_info['id'] = category_wise_item_id;
                item_info['name'] = null;
                item_info['price'] = null;
                item_info['sub_category'] = '';

                $.grep(category_wise_items, function(category_wise_item) {
                    if(category_wise_item.id == category_wise_item_id){
                        //We find category wise item ** now need to find item and sub category
                        item_info['price'] = category_wise_item.price;
                        if(category_wise_item.item_id){
                            //Find Item
                            $.grep(items, function(item) {
                                if(item.id == category_wise_item.item_id){
                                    item_info['name'] = item.name;
                                }
                            });
                        }
                        if(category_wise_item.sub_category_id){
                            //Find sub category
                            $.grep(sub_categories, function(sub_category) {
                                if(sub_category.id == category_wise_item.sub_category_id){
                                    item_info['sub_category'] = sub_category.name;
                                }
                            });
                        }
                    }
                });
                return item_info;
            }

            function add_to_basket(category_wise_item_id) {
                let item_info = get_item_details_by_category_wise_item_id(category_wise_item_id)
                if (check_from_basket(category_wise_items, category_wise_item_id)[0]) {
                    if (check_from_basket(basket, category_wise_item_id)) { //increase qty
                        basket[check_from_basket(basket, category_wise_item_id)[1]]['quantity'] += 1;
                    } else { //add as new in basket
                        basket.push({
                            id: category_wise_item_id,
                            name: item_info.name,
                            sub_category: item_info.sub_category,
                            price: item_info.price,
                            quantity: 1,
                            offer_id : null,
                        });
                    }
                } else {
                    Swal.fire('দুঃখিত', 'এই নাম্বারের তালিকা ভুক্ত আইটেম নেই', 'info')
                }
                basket_render();
            }

            function remove_from_basket(category_wise_item_id) {
                if (check_from_basket(basket, category_wise_item_id)) {
                    if (basket[check_from_basket(basket, category_wise_item_id)[1]]['quantity'] > 1)
                        basket[check_from_basket(basket, category_wise_item_id)[1]]['quantity'] -= 1;
                } else {
                    Swal.fire('দুঃখিত', 'এখন পর্যন্ত বাছাই করাই হয়নি', 'info')
                }
                basket_render();
            }

            function remove_all_to_basket(category_wise_item_id) {
                if (check_from_basket(basket, category_wise_item_id)) {
                    basket.splice(check_from_basket(basket, category_wise_item_id)[1], 1)
                } else {
                    Swal.fire('দুঃখিত' , 'এখন পর্যন্ত বাছাই করাই হয়নি', 'info')
                }
                basket_render();
            }

            function check_from_basket(array_collection, category_wise_item_id) {
                result = null;
                $.map(array_collection, function(collection_item, index) {
                    if (collection_item.id == category_wise_item_id) {
                        result = [collection_item, index]
                    }
                });
                return result;
            }

            function basket_render() {
                var html = '';
                if (basket.length > 0) {
                    $.map(basket, function(item, index) {
                        html +=
                            `
                        <tr class="item_card">
                            <td>` + (index + 1) + `</td>
                            <td style="font-size:12px;">`+ item.name + `<sub>`+item.sub_category+`</sub></td>
                            <td style="text-align: right;" class="price_item">` + item.price + `</td>
                            <td style="text-align: right;">
                                <input type="hidden" class="category_wise_item_id" value="` + item.id + `">
                                <input type="number" style="width: 50px;" class="form-control form-control-sm quantity" minimum="1" value="` + item.quantity + `">
                            </td>
                            <td style="text-align: right;" class="sub_total">` + (item.price * item.quantity) + `</td>
                            <td style="text-align: right;">
                                <i class="fa fa-plus-square fa-lg text-success hoverable" onclick="add_to_basket(` + item.id + `)"></i>
                                <i class="fa fa-minus-square fa-lg text-warning hoverable" onclick="remove_from_basket(` + item.id + `)"></i>
                                <i class="fa fa-trash fa-lg text-danger hoverable" onclick="remove_all_to_basket(` + item.id + `)"></i>
                            </td>
                        </tr>
                        `;
                    });
                }
                document.getElementById("basket_table").innerHTML = html;
                total_counter();
            }

            $('#basket_table').on('keyup change', '.quantity', function() {
                let quantity = $(this).val();
                let price = $(this).parent().parent().find('.price_item').text();
                let category_wise_item_id = $(this).parent().find('.category_wise_item_id').val();

                $(this).parent().parent().find('.sub_total').text(quantity * price);
                if (quantity == '' || quantity == null) {
                    quantity = 0;
                }
                if (check_from_basket(basket, category_wise_item_id)) {
                    basket[check_from_basket(basket, category_wise_item_id)[1]]['quantity'] = parseInt(quantity);
                    total_counter();
                } else {
                    Swal.fire('দুঃখিত', 'এখন পর্যন্ত বাছাই করাই হয়নি', 'info')
                }
            });

            function total_counter(){
                var total_price = 0;
                $.map(basket, function(item, index) {
                    total_price += item.price * item.quantity;
                });
                document.getElementById("total_price").innerHTML = total_price + ' টাকা';
            }

            $('.item_search_by_id_field').on('input', function() {
                $(".item").hide();
                $(".item_id_"+$(this).val()).show();
                if(!$(this).val()){
                    $(".item").show();
                }
            });

            function save_invoice(){
                if(basket.length > 0){
                    let data = {
                        basket: basket,
                        waiter: $('#waiter').val(),
                        table: $('#table').val(),
                        phone: $('#phone').val(),
                        address: $('#address').val(),
                        parcel: $('#parcel_check').val(),
                        delivery_charge: $('#delivery_charge').val(),
                        discount_percentage: $('#discount_percentage').val(),
                    };

                    $.ajax({
                        type: 'GET', //THIS NEEDS TO BE GET
                        url: '/manager/pos/save/'+encodeURIComponent(JSON.stringify(data)),
                        beforeSend: function() {
                            $('#save_btn').html('Please wait ---- ');
                            $('#save_btn').prop("disabled", true);
                        },
                        complete: function() {
                            $('#save_btn').html('SAVE');
                            $('#save_btn').prop("disabled", false);
                        },

                        success: function (data) {
                            console.log(data);
                            if(data.type == 'error'){
                                let messages = '';
                                $.each(data.messages, function( index, value ) {
                                    messages += value + ", ";
                                });
                                Swal.fire({
                                    icon: 'error',
                                    text: messages,
                                    showConfirmButton: false
                                });
                            }else if(data.invoice_url){
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'Order has been saved',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                all_clear(0);
                                printJS(data.invoice_url);
                                Livewire.emit('updateOrder');
                            }else{
                                console.log(data);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Something went wrong!',
                                    showConfirmButton: false
                                });
                            }
                        },
                        error: function() {
                            console.log(data);
                        }
                    });
                }else{
                    Swal.fire({
                        icon: 'info',
                        title: 'Item Empty...',
                        text: '',
                        showConfirmButton: false
                    });
                }
            }

            $('#delivery_charge').val('0').prop('disabled', true);
            $('#parcel_check').change(function(){
                if ($('#parcel_check').is(':checked') == true){
                    $('#delivery_charge').val(0).prop('disabled', false);
                    $('#table').val(null).prop('disabled', true);
                    $('#parcel_check').val('1');
                } else {
                    $('#delivery_charge').val('0').prop('disabled', true);
                    $('#table').val(null).prop('disabled', false);
                    $('#parcel_check').val('0');
                }
            });


            function onlyNumberKey(evt) {
                // Only ASCII character in that range allowed
                var ASCIICode = (evt.which) ? evt.which : evt.keyCode
                if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                    return false;
                return true;
            }

            document.addEventListener("keypress", function(event) {
                console.log(event.keyCode);
                if (event.keyCode == 13) { // 13 means enter
                    save_invoice();
                }
                if (event.keyCode == 45) { // 45 means -
                    all_clear();
                }
                // if (event.keyCode == 112) { // 112 means p
                //     print_invoice();
                // }
            });

            function all_clear(alert_message = 1){
                $('#table').val(null);
                $('#waiter').val(null);
                $('#phone').val(null);
                $('#address').val(null);
                $('#discount_percentage').val(null);
                $('#parcel_check').prop('checked', false);
                $('#parcel_check').val('0');
                $('#delivery_charge').val('0').prop('disabled', true);
                $('#table').val(null).prop('disabled', false);

                basket = [];
                basket_render();
                if(alert_message == 1){
                    Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Clear ....',
                    showConfirmButton: false,
                    timer: 1500
                });   
                }
            }
        </script>
    </div>

</div>

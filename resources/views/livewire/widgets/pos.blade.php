<div class="row" wire:ignore>
    <div class="col-7">
        <div class="card">
            <div class="card-header bg-danger text-white d-flex justify-content-between">
                @if(config('app.frontend'))
                <a href="{{ route('onlineOrder') }}" class="btn btn-primary">
                    Online Order <b>({{ $online_pending_order }}) </b>
                </a>
                @endif
                <input type="text" class="form-control item_search_by_id_field" placeholder="Item ID">
            </div>
            <div class="card-body item-card">
                <div class="row">
                    @foreach ($items as $item)
                    <div class="col-3 item item_id_{{ $item->id }}">
                        <div class="card m-1 hoverable" @if($item->category_wise_items_count == 1) onclick="add_to_basket({{ $item->category_wise_items()->first()->id }})"
                            @else
                            data-bs-toggle="modal" data-bs-target="#category_wise_items_modal"
                            onclick="category_wise_items_modal_open({{ $item->id }}, '{{ $item->name }}')"
                            @endif>
                            <img class="card-img-top rounded mx-auto d-block" height="90px;" style="margin-bottom: -10px;" src="{{ asset($item->image ?? 'assets/images/food-icon.png') }}">
                            <div class="card-body text-center">
                                <p class="card-text" style="margin-bottom: -5px;">{{ $item->name }}</p>
                                <span class="badge bg-primary">{{ $item->price }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="category_wise_items_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="category_wise_items_modal_title">{{-- Set by jQuery --}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body item-card" id="category_wise_items_modal_body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Understood</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-5">
        <div class="card">
            <div class="card-body item-card">
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-center">
                        <style>
                            #total_price {
                                text-align: center;
                                border: 5px solid rgba(94, 255, 0, 0.103);
                                font-size: 40px;
                                width: 3in;
                                border-radius: 18px;
                                background: green;
                                color:white;
                                font-weight: bold;
                                }
                        </style>
                        <div id="total_price">00.00 টাকা</div>
                    </div>
                    {{-- <div class="col-md-12 d-flex justify-content-center mt-2">
                        <input type="number" class="form-control text-center" id="item_number" placeholder="item Number" onkeypress="return onlyNumberKey(event)">
                    </div> --}}
                </div>
                <table class="table table-striped table-hover mt-1">
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
                <button type="button" class="btn btn-primary btn-lg btn-block" style="width: 100%;" onclick="save_invoice()">Save Invoice</button>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header">
                কীবোর্ড শর্টকাট
            </div>
            <div class="card-body">
                ১. <b class="text-danger">(Space)</b> বাটনে চাপ দিলে আইটেম নাম্বার এন্টি দেওয়া যাবে। <br>
                ২. আইটেম নাম্বার এন্ট্রি দেওয়ার ঘরকে খালি করতে হলে <b class="text-danger">(Space)</b> বাটনে চাপ দিতে হবে। <br>
                ৩. প্রোডাক্ট নাম্বার এন্ট্রি দেওয়ার পর <b class="text-danger">(+)</b> বাটনে চাপ দিলে কোয়ান্টিটি বাড়বে। <br>
                ৪. প্রোডাক্ট নাম্বার এন্ট্রি দেওয়ার পর <b class="text-danger">(-)</b> বাটনে চাপ দিলে উত্তর প্রোডাক্টের কোয়ান্টিটি কমবে। <br>
                ৫. আইটেম নাম্বার এন্ট্রি দেওয়ার পর <b class="text-danger">(/)</b> বাটনে চাপ দিলে আইটেম চলে যাবে। <br>
                ৬. <b class="text-danger">(s)</b> অথবা <b class="text-danger">(Enter) </b>বাটনে চাপ দিলে ইনভয়েস প্রিন্টের জন্য রেডি হবে। <br>
                ৭. <b class="text-danger">(c)</b> বাটনে চাপ দিয়ে সিলেক্টেড আইটেম গুলোকে ক্লিয়ার করে দেওয়া যাবে। <br>
            </div>
        </div>
    </div>

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
                            <input type="number" style="width: 80px;" class="form-control form-control-sm quantity" minimum="1" value="` + item.quantity + `">
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
                basket[check_from_basket(basket, category_wise_item_id)[1]]['quantity'] = quantity;
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

        // $('.quantity').on('input', function() {
        //     let quantity = $(this).val();
        //     basket[check_from_basket(basket, $(this).parent().find('.category_wise_item_id').val())[1]]['quantity'] = quantity;
        //     basket_render();

        // });

        $('.item_search_by_id_field').on('input', function() {
            $(".item").hide();
            $(".item_id_"+$(this).val()).show();
            if(!$(this).val()){
                $(".item").show();
            }
        });

        function save_invoice(){
            if(basket.length > 0){
                $.ajax({
                    type: 'GET', //THIS NEEDS TO BE GET
                    url: '/manager/pos/save/'+encodeURIComponent(JSON.stringify(basket)),
                    success: function (data) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Success',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        printJS(data.invoice_url)
                    },
                    error: function() {
                        console.log(data);
                    }
                });
                basket=[];
                basket_render();
            }else{
                Swal.fire( 'Sorry', 'Selected item not found', 'info')
            }
        }

        function onlyNumberKey(evt) {
            // Only ASCII character in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                return false;
            return true;
        }

        document.addEventListener("keypress", function(event) {
            if (event.keyCode == 115 || event.keyCode == 13) { // 115 means s or enter
                save_invoice();
            }
            if (event.keyCode == 99) { // 99 means c
                basket=[];
                basket_render();
                document.getElementById("item_number").value = '';
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Clear ....',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
            // if (event.keyCode == 112) { // 112 means p
            //     print_invoice();
            // }
        });
    </script>
</div>

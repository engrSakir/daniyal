<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/527f038fb3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css">
    <script src="https://printjs-4de6.kxcdn.com/print.min.js" crossorigin="anonymous"></script>

    <title>POS</title>
    <style>
        .hoverable {
            border-radius: 4px;
            background: #fff;
            box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
            transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);
            /* padding: 14px 80px 18px 36px; */
            cursor: pointer;
        }

        .hoverable:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
        }

        .item-card {
            height: 9in;
            overflow: auto;
            background: #fff;
        }

        .item-inner-card-danger {
            height: 200px;
            overflow: auto;
            background: rgb(226, 18, 18);
            color: #fff;
        }

        .item-inner-card-success {
            height: 200px;
            overflow: auto;
            background: rgb(7, 240, 46);
        }

        .item-inner-card-primary {
            height: 200px;
            overflow: auto;
            background: rgb(7, 108, 240);
        }

        .pointer {
            cursor: pointer;
        }

        #item_number {
            width: 90%;
            border: 2px solid rgb(248, 31, 2);
            border-radius: 10px;
            margin: 8px 0;
            outline: none;
            padding: 15px;
            box-sizing: border-box;
            transition: .3s;
            font-size: 16px;
            font-weight: bold;
        }

        input[type=number]:focus {
            border-color: dodgerBlue;
            box-shadow: 0 0 8px 0 dodgerBlue;
        }

    </style>
</head>
<body>
    <div class="row">
        @include('pos._item')
        @include('pos._calculation')
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        var items = {!! $items !!};
        var category_wise_items = {!! $category_wise_items !!};
        var sub_categories = {!! $sub_categories !!};

        basket = [];

        // get_from_basket(basket, item_number) [0].. for data and [1] for array key
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
            item_info['sub_category'] = null;

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
            if (get_from_basket(category_wise_items, category_wise_item_id)[0]) {
                if (get_from_basket(basket, category_wise_item_id)) { //increase qty
                    basket[get_from_basket(basket, category_wise_item_id)[1]]['quantity'] += 1;
                } else { //add as new in basket
                    basket.push({id: category_wise_item_id, name: item_info.name, price: item_info.price, quantity: 1});
                }
            } else {
                Swal.fire('দুঃখিত', 'এই নাম্বারের তালিকা ভুক্ত আইটেম নেই', 'info')
            }
            basker_render();
        }

        function remove_from_basket(category_wise_item_id) {
            if (get_from_basket(basket, category_wise_item_id)) {
                if (basket[get_from_basket(basket, category_wise_item_id)[1]]['quantity'] > 1)
                    basket[get_from_basket(basket, category_wise_item_id)[1]]['quantity'] -= 1;
            } else {
                Swal.fire('দুঃখিত', 'এখন পর্যন্ত বাছাই করাই হয়নি', 'info')
            }
            basker_render();
        }

        function remove_all_to_basket(category_wise_item_id) {
            if (get_from_basket(basket, category_wise_item_id)) {
                basket.splice(get_from_basket(basket, category_wise_item_id)[1], 1)
            } else {
                Swal.fire('দুঃখিত' , 'এখন পর্যন্ত বাছাই করাই হয়নি', 'info')
            }
            basker_render();
        }

        function get_from_basket(array_collection, category_wise_item_id) {
            result = null;
            $.map(array_collection, function(collection_item, index) {
                if (collection_item.id == category_wise_item_id) {
                    result = [collection_item, index]
                }
            });
            return result;
        }

        function basker_render() {
            var html = '';
            var total_price = 0;
            if (basket.length > 0) {
                $.map(basket, function(item, index) {
                    total_price += item.price * item.quantity;
                    html +=
                        `
                    <tr class="item_card">
                        <td>` + (index + 1) + `</td>
                        <td style="font-size:12px;">` + item.id + '- ' + item.name + `</td>
                        <td style="text-align: right;" class="price">` + item.price + `</td>
                        <td style="text-align: right;">
                            <input type="hidden" class="item_number" value="` + item.id + `">
                            <input type="number" style="width: 80px;" class="form-control form-control-sm quantity" value="` + item.quantity + `">
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
            document.getElementById("total_price").innerHTML = total_price + ' টাকা';
        }

        $('#basket_table').on('keyup change', '.quantity', function() {
            let quantity = $(this).val();
            let price = $(this).parent().parent().find('.price').text();
            let item_number = $(this).parent().find('.item_number').val();
            $(this).parent().parent().find('.sub_total').text(quantity * price);
            if (quantity == '' || quantity == null) {
                quantity = 0;
            }
            if (get_from_basket(basket, item_number)) {
                basket[get_from_basket(basket, item_number)[1]]['quantity'] = quantity;
            } else {
                Swal.fire('দুঃখিত', 'এখন পর্যন্ত বাছাই করাই হয়নি', 'info')
            }
        });

        $('.item_search_by_id_field').on('input', function() {
            $(".item").hide();
            $(".item_id_"+$(this).val()).show();
            if(!$(this).val()){
                $(".item").show();
            }
        });

    </script>

</body>
</html>

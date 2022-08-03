<div class="col-5">
    <div class="card">
        <div class="card-header bg-danger text-white d-flex justify-content-between">
            <div>
                <div class="input-group">
                    <input type="number" class="form-control" placeholder="Sales receipt ID" name="sales_receipt_id" wire:model="sales_receipt_id">
                    <div class="input-group-append">
                        <a href="#" class="btn btn-success" target="_blank"><i class="fas fa-print"></i> PRINT</a>
                    </div>
                </div>
            </div>
        </div>
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
                <div class="col-md-12 d-flex justify-content-center mt-2">
                    <input type="number" class="form-control text-center" id="item_number" placeholder="item Number" onkeypress="return onlyNumberKey(event)">
                </div>
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

<script>
    function save_invoice(){
        if(basket.length > 0){
            $.ajax({
                type: 'GET', //THIS NEEDS TO BE GET
                url: '/pos/save/'+encodeURIComponent(JSON.stringify(basket)),
                success: function (data) {
                    // console.log(data)
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'সফলভাবে তৈরি হয়েছে',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    printJS(data.invoice_url)
                },
                error: function() {
                    console.log(data);
                }
            });
            basket=[];
            document.getElementById("item_number").value = '';
            basker_render();
        }else{
            Swal.fire(
                'দুঃখিত',
                'বিক্রয়ের জন্য বাছাই করাই হয়নি',
                'info')
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
        // console.log(event.which);
        item_number = document.getElementById("item_number").value;
        if (item_number) {
            if (event.keyCode == 43) { // 43 means +
                add_to_basket(item_number);
            }
            if (event.keyCode == 45) { // 45 means -
                remove_from_basket(item_number);
            }
            if (event.keyCode == 47) { // 47 means /
                remove_all_to_basket(item_number);
            }
        }
        if (event.keyCode == 115 || event.keyCode == 13) { // 115 means s or enter
            save_invoice();
        }
        if (event.keyCode == 32) { // 115 means space
            document.getElementById('item_number').value = '';
            document.getElementById('item_number').focus();
            document.getElementById('item_number').select();
        }
        if (event.keyCode == 99) { // 99 means c
            basket=[];
            basker_render();
            document.getElementById("item_number").value = '';
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'বাছাই করা আইটেমগুলো বাদ দেয়া হয়েছে',
                showConfirmButton: false,
                timer: 1500
            })
        }
        // if (event.keyCode == 112) { // 112 means p
        //     print_invoice();
        // }
    });

</script>

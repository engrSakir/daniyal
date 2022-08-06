<div class="container-fluid">
    <style>
        .item_box {
            height: 415px;
            overflow: auto;
        }

        .card_box {
            height: 300px;
            overflow: auto;
        }

        .form-group {
            margin-bottom: 0rem;
        }
    </style>
    <div class="row">
        @livewire('widgets.pos')
        @livewire('widgets.order')
    </div>
</div>
<!-- End container-fluid-->

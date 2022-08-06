@extends('layouts.app')
@section('content')

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

        #category_wise_item_id {
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

        @livewire('widgets.pos')
        @livewire('widgets.order')
@endsection

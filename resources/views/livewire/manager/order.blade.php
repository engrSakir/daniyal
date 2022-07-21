<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <div class="card border border-primary">
                <div class="card-body">
                    <select class="form-control" wire:model="category_id">
                        <option value="-1">Select Category</option>
                        @foreach ($caregories as $category_option)
                        <option value="{{ $category_option->id }}">{{ $category_option->name }}</option>
                        @endforeach
                    </select>
                    <p class="text-danger" wire:loading wire:target="category_id">
                        Updating Items -----
                    </p>
                    @if($category)
                    <table class="table table-bordered">
                        <thead class="">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Items</th>
                                @if($category->has_sub_category)
                                @foreach ($category->sub_categories as $sub_category)
                                <th scope="colr" style="text-align: center;">{{ $sub_category->name }}</th>
                                @endforeach
                                @else
                                <th scope="colr" style="text-align: center;">Price</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category->category_wise_items as $category_wise_item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    {{ $category_wise_item->item->name }}
                                    @if($category->has_sub_item)
                                    <small>
                                        <ol>
                                            @foreach ($category_wise_item->item->sub_items as $sub_tem)
                                            <li>{{ $sub_tem->name }}</li>
                                            @endforeach
                                        </ol>
                                    </small>
                                    @endif
                                </td>
                                @if($category->has_sub_category)
                                @foreach ($category->sub_categories as $sub_category)
                                <td style="text-align: center;">
                                    <button  wire:click="item_add_or_remove({{ $category_wise_item, $sub_category->id }})" type="button" class="btn btn-inverse-secondary btn-round waves-effect waves-light m-1">
                                        {{ price_helper($category_wise_item->item_id, $category_wise_item->category_id, $sub_category->id) }}
                                    </button>
                                </td>
                                @endforeach
                                @else
                                <td style="text-align: center;">
                                    <button wire:click="item_add_or_remove({{ $category_wise_item,null }})" type="button" class="btn btn-inverse-secondary btn-round waves-effect waves-light m-1">
                                        {{ $category_wise_item->price }}
                                    </button>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="alert alert-outline-warning alert-dismissible mt-3" role="alert">
                        <div class="alert-icon">
                            <i class="icon-exclamation"></i>
                        </div>
                        <div class="alert-message">
                            <span><strong>Hey!</strong> Please select a category</span>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border border-primary">
                <div class="card-body">
                    <h5 class="card-title text-primary">Card Sample Title</h5>
                    <p class="card-text">
                        {{ collect($items_array) }}
                    </p>
                    <hr>
                    <a href="javascript:void();" class="btn btn-inverse-primary waves-effect waves-light m-1"><i class="fa fa-globe mr-1"></i> Button</a>
                    <a href="javascript:void();" class="btn btn-primary waves-effect waves-light m-1"><i class="fa fa-star mr-1"></i> Button</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modal" wire:ignore.self>
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white"><i class="fa fa-star"></i>Waiter Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="submit">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">name</label>
                                <input type="text" class="form-control" wire:model="name" id="name">
                                <x-error name="name" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                            <button type="reset" class="btn btn-secondary"><i class="fa fa-refresh"></i>
                                Reset</button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-check-square-o"></i>
                                Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- End container-fluid-->

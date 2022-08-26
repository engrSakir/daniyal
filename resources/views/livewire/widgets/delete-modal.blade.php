<div wire:ignore.self class="modal fade delete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <img src="{{ asset('assets/images/delete.gif') }}">
            <div class="btn-group btn-group-sm" role="group" aria-label="...">
                <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" wire:click="delete">Delete</button>
            </div>
        </div>
    </div>
</div>

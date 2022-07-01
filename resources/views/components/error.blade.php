<div>
    @error($name)
    <div class="alert alert-light-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">×</button>
         <div class="alert-icon">
          <i class="icon-close"></i>
         </div>
         <div class="alert-message">
           <span><strong>Error !</strong>{{ $message }}</span>
         </div>
       </div>
    @enderror
</div>

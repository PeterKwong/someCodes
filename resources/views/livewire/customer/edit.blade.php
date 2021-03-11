<div>
    
      <center>
      <p>{{__('shoppingCart.Shipping Address') }}</p>

       <div class="rounded border mx-4">
          <form wire:submit.prevent="save">

                <div class="grid grid-cols-12">
                  <div class="col-span-4 input-group-prepend m-1">
                    <span class="input-group-text" id="basic-addon1">
                      * {{ __('shoppingCart.Name') }}
                    </span>
                  </div>
                  <input type="text" class="col-span-8 input w-9/12 m-1" class="is-invalided"  placeholder="{{ __('shoppingCart.Name') }}" aria-label="Username" aria-describedby="basic-addon1"  wire:model.defer="customer.name" required>
                </div>
                  @error('customer.name') 
                    <span class="error" style="color:red;">{{ $message }}</span> 
                  @enderror

                <div class="grid grid-cols-12">
                  <div class="col-span-4 input-group-prepend m-1">
                    <span class="input-group-text" id="basic-addon1">
                      * {{ __('shoppingCart.Email') }}
                    </span>
                  </div>
                  <input type="text" class="col-span-8 input w-9/12 m-1" class="is-invalided"  placeholder="{{ __('shoppingCart.Email') }}" aria-label="Useremail" aria-describedby="basic-addon1"  wire:model.defer="customer.email" required>
                </div>
                  @error('customer.email') 
                    <span class="error" style="color:red;">{{ $message }}</span> 
                  @enderror

                <div class="grid grid-cols-12">
                  <div class="col-span-4 input-group-prepend m-1">
                    <span class="input-group-text" id="basic-addon1">
                      * {{ __('shoppingCart.Phone') }}
                    </span>
                  </div>
                  <input type="text" class="col-span-8 input w-9/12 m-1" class="is-invalided"  placeholder="{{ __('shoppingCart.Phone') }}" aria-label="Userphone" aria-describedby="basic-addon1"  wire:model.defer="customer.phone" required>
                </div>
                  @error('customer.phone') 
                    <span class="error" style="color:red;">{{ $message }}</span> 
                  @enderror

                <div class="grid grid-cols-12">
                  <div class="col-span-4 input-group-prepend m-1">
                    <span class="input-group-text" id="basic-addon1">
                      {{ __('shoppingCart.Address') }}
                    </span>
                  </div>
                  <input type="text" class="col-span-8 input w-9/12 m-1" class="is-invalided"  placeholder="{{ __('shoppingCart.Address') }}" aria-label="Useraddress" aria-describedby="basic-addon1"  wire:model.defer="customer.address" >
                </div>
                  @error('customer.address') 
                    <span class="error" style="color:red;">{{ $message }}</span> 
                  @enderror




              <div class="" >
                <div class="grid grid-cols-12">
                  <div class="col-span-4 input-group-prepend m-1">
                    <label class="input-group-text" for="inputGroupSelect01">{{__('shoppingCart.Area') }}
                    </label>
                  </div>
                  <select class="col-span-8 w-9/12 rounded p-1 box m-1" wire:model="customer.country">
                    <option value="HK">{{__('shoppingCart.HK') }}</option>
                    <option value="CN">{{__('shoppingCart.CN') }}</option>
                  </select>
                </div>

                @if($customer['country'] == 'CN')
                  <div class="col ">
                    <p style="color: red">*<small> {{__('shoppingCart.China customer will be sent a ring size tool.') }} </small></p>
                  </div>
                 @endif

              </div>

              <div class="row" >

                <div class="col">
                  <center>
                  <button class="btn btn-primary" :disabled="isProcessing" type="submit" >{{__('shoppingCart.Save' ) }}</button>
                  </center>
                </div>
              </div>


          </form>

      </div>


  </center>
</div>

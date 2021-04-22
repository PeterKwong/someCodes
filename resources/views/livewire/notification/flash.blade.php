<div>
    
  @if($flash)
  <div x-data="notificationFlash()" x-show="flash.show">

  	<div aria-live="assertive" class="fixed m-12 inset-0 flex items-end justify-center px-4 py-6 pointer-events-none sm:p-6 sm:items-start sm:justify-end" >
	  <!--
	    Notification panel, dynamically insert this into the live region when it needs to be displayed

	    Entering: "transform ease-out duration-300 transition"
	      From: "translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
	      To: "translate-y-0 opacity-100 sm:translate-x-0"
	    Leaving: "transition ease-in duration-100"
	      From: "opacity-100"
	      To: "opacity-0"
	  -->
	  <div class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
	    <div class="p-4">
	      <div class="flex items-start">
	        <div class="flex-shrink-0">
	          <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" x-show="flash.type == 'error' ">
		        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
		      </svg>
	          <!-- Heroicon name: outline/check-circle -->
	          <svg class="h-6 w-6 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true" x-show="flash.type == 'success' ">
	            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
	          </svg>
	        </div>
	        <div class="ml-3 w-0 flex-1 pt-0.5">
		          <p class="font-medium text-{{ $textType[$flash['type']] }}-500">
		            {{__('message.'.$flash['title'])}}
		          </p>
	            @foreach($flash['messages'] as $message)
		           <p class="mt-1 text-sm text-gray-500">
		            {{__('message.'.$message)}}
		          </p> 
	            @endforeach
	          
	        </div>
	        <div class="ml-4 flex-shrink-0 flex">
	          <button class="bg-white rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" x-on:click="flash.show = false">
	            <span class="sr-only">Close</span>
	            <!-- Heroicon name: solid/x -->
	            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
	              <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
	            </svg>
	          </button>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>

   @endif



<script>
  function notificationFlash(){

    return {
        flash: @entangle('flash'),

    }
  }
</script>



</div>

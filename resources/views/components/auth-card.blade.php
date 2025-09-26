<div class="auth-card-wrapper">
   @if(isset($logo) && $logo)
   <div class="auth-header mb-4">
       {{ $logo }}
   </div>
   @endif

   <div class="auth-card p-5 bg-white rounded shadow-sm">
       <div class="auth-content">
           {{ $slot }}
       </div>
   </div>
</div>

 @extends('layouts.app')

 @section('main')
  {!! RecaptchaV3::initJs() !!}
     <div data-barba="container">
         @php use \App\Http\Controllers\GlobalController; @endphp
         @if (session('Message_envoye'))
             <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000, PopupUser())" class="pt-1 pr-4">
                 <div id="popmenu" class="px-4 py-2 text-xs btnmenu text-emerald-500">&zwnj; Email envoyé</div>
             </div>
         @endif
         @if (session('already_send'))
             <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000, PopupUser())" class="pt-1 pr-4">
                 <div id="popmenu" class="px-4 py-2 text-xs btnmenu text-emerald-500">&zwnj; Vous avez déja envoyé un
                     message aujourd'hui</div>
             </div>
         @endif
                 <div class="mb-4 px-2 py-4 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
                <div class="flex flex-col max-w-5xl pb-8 mx-auto mb-8 overflow-hidden rounded">
                 <section class="relative text-gray-600 body-font">
                     <div class="container px-5 py-8 mx-auto">
                         <div class="flex flex-col w-full mb-4 text-center">
                             <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-5xl title-font">Espace Aide</h1>
                         </div>
                         <div class="mx-auto lg:w-1/2 md:w-2/3">
                             <form class="flex flex-wrap -m-2" method="post" action="contactmail">
                                 @csrf
                                 <div class="w-1/2 p-2">
                                     <div class="relative">
                                         <label for="name" class="text-sm leading-7 text-gray-200">
                                         @if (backpack_auth()->check())
                                            Pseudo 
                                            @else
                                         Nom
                                         @endif
                                         </label>
                                         <input @if (backpack_auth()->check())
                                            value="{{ backpack_auth()->user()->name }}" disabled 
                                            @endif
                                          type="text" id="name" name="name" required
                                             class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
                                     </div>
                                 </div>
                                 <div class="w-1/2 p-2">
                                     <div class="relative">
                                         <label for="email" class="text-sm leading-7 text-gray-200">Email</label>
                                         <input @if (backpack_auth()->check())
                                            value="{{ backpack_auth()->user()->email }}" disabled
                                            @endif type="email" id="email" name="email" required
                                             class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
                                     </div>
                                 </div>
                                 <div class="w-full p-2">
                                     <div class="relative">
                                         <label for="message" class="text-sm leading-7 text-gray-200">Message</label>
                                         <textarea id="message" name="message" required
                                             class="w-full h-32 px-3 py-1 text-base leading-6 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none resize-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200"></textarea>
                                     </div>
                                 </div>
                                 <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                     <div class="col-md-6">
                                         {!! RecaptchaV3::field('register') !!}
                                         @if ($errors->has('g-recaptcha-response'))
                                             <span class="help-block">
                                                 <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                             </span>
                                         @endif
                                     </div>
                                 </div>
                                 <div class="flex justify-center w-full p-2">
                                     <button type="submit"
                                         class="relative flex justify-center w-48 px-5 py-1 my-2 mt-2 font-medium text-white shadow-lg prevent group">
                                         <span
                                             class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform translate-x-0 -skew-x-12 bg-blue-500 group-hover:bg-blue-700 group-hover:skew-x-12"></span>
                                         <span
                                             class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform skew-x-12 bg-blue-700 group-hover:bg-blue-500 group-active:bg-blue-600 group-hover:-skew-x-12"></span>
                                         <span
                                             class="absolute bottom-0 left-0 hidden w-10 h-20 transition-all duration-100 ease-out transform -translate-x-8 translate-y-10 bg-blue-600 -rotate-12"></span>
                                         <span
                                             class="absolute bottom-0 right-0 hidden w-10 h-20 transition-all duration-100 ease-out transform translate-x-10 translate-y-8 bg-blue-400 -rotate-12"></span>
                                         <span class="relative">Envoyer le message</span>
                                     </button>
                                 </div>
                             </form>
                         </div>
                     </div>
                 </section>

             </div>
         </div>
     </div>
     <script>
         function PopupUser() {
             console.log('okpop');
             var updateElement = document.getElementById("popmenu");
             updateElement.classList.toggle("active");

         }
     </script>
 @endsection

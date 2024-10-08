@php
    use \App\Http\Controllers\GlobalController;
    $isMobile = GlobalController::isMobile();
@endphp

<!-- FOOTER -->
<container id="footer" class="mx-auto text-gray-400 body-font max-w-7xl">
    <div class="container flex flex-col flex-wrap px-5 py-2 mx-auto md:items-center lg:items-start md:flex-row md:flex-nowrap">
        <div class="flex-shrink-0 w-64 mx-auto text-center md:mx-0 md:text-left">
            <a href="/" class="flex items-center justify-center font-medium text-gray-700 title-font md:justify-start">
                <h2 class="
                @if($isMobile == true)
                mb-1 
                @else
                mb-3
                @endif        
                 text-sm font-medium tracking-widest text-blue-400 title-font">{{__('Sondages rémunérés')}}</h2>
            </a>
            <p class="mt-2 
            @if($isMobile == true)
                text-xs
                @else
                text-sm
                @endif            
             text-gray-400">{{__("Sondages rémunérateurs")}}<br>
                {{__("GoKDO est un site de sondages rémunérés totalement GRATUIT.")}}
            </p>
        </div>
        <div class="flex flex-wrap flex-grow 
        @if($isMobile == true)
        mt-4 
        @else
        mt-10 
        @endif
        @if($isMobile == true)
                mb-2 
                @else
                
                @endif
         text-center md:pl-20 md:mt-0 md:text-left">
            <div class="w-full px-4 lg:w-1/4 md:w-1/2">
            </div>
            <div class="w-full px-4 lg:w-1/4 md:w-1/2">
            </div>
            <div class="w-full px-4 lg:w-1/4 md:w-1/2">
                <h2 class="
                @if($isMobile == true)
                mb-1 
                @else
                mb-3
                @endif
                text-sm font-medium tracking-widest text-blue-400 title-font">{{__('A Propos')}}</h2>
                <div class="
                  @if($isMobile == true)
                mb-2
                @else
                mb-10
                @endif
                 list-none">
                    <ul>
                    @if($isMobile == true)
                            <a href="/reglement" class="text-gray-400 hover:text-gray-500 text-xs">{{__('Règlement')}}</a> - 
                            <a href="mentions-legales" class="text-gray-400 hover:text-gray-500  text-xs">{{__('Mentions Légales')}}</a> - 
                            <a href="confidentialite-site" class="text-gray-400 hover:text-gray-500  text-xs">{{__('Confidentialité')}}</a>
                    @else
                        <li>
                            <a href="/reglement" class="text-gray-400 hover:text-gray-500">{{__('Règlement')}}</a>
                        </li>
                        <li>
                            <a href="mentions-legales" class="text-gray-400 hover:text-gray-500">{{__('Mentions Légales')}}</a>
                        </li>
                        <li>
                            <a href="confidentialite-site" class="text-gray-400 hover:text-gray-500">{{__('Confidentialité')}}</a>
                        </li>
                    @endif
                    </ul>
                </div>
            </div>
            <div class="w-full px-4 lg:w-1/4 md:w-1/2">
                <h2 class="
                @if($isMobile == true)
                mb-1 mt-0
                @else
                mb-3 
                @endif
                text-sm font-medium tracking-widest text-blue-400 title-font">{{__('Plus')}}</h2>
                <div class="
                @if($isMobile == true)
                mb-1
                @else
                mb-10
                @endif
                 list-none">
                    <ul>
                    @if($isMobile == true)
                            <a href="aide" class="text-gray-400 hover:text-gray-500  text-xs">{{__('Aide')}}</a> - 
                            <a href="contact" class="text-gray-400 hover:text-gray-500  text-xs">{{__('Contact')}}</a>
                    @else
                        <li>
                            <a href="aide" class="text-gray-400 hover:text-gray-500">{{__('Aide')}}</a>
                        </li>
                        <li>
                            <a href="sondages" class="text-gray-400 hover:text-gray-500">{{__('Top 10 Sondages')}}</a>
                        </li>
                        <li>
                            <a href="contact" class="text-gray-400 hover:text-gray-500">{{__('Contact')}}</a>
                        </li>
                    @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-gray-700">
        <div class="container flex flex-col flex-wrap px-5 py-4 mx-auto sm:flex-row">
            <p class="text-sm text-center text-white sm:text-left">© 2024 GoKDO - Gagner de l'argent avec les sondages rémunérés - {{__('Tous Droits Réservés')}}</p> 
        </div>
    </div>
</container>

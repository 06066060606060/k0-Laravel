@extends('layouts.app')

@section('main')

<div data-barba="container">
    @php use \App\Http\Controllers\GlobalController; @endphp
    <div class="mb-4 px-2 py-4 mx-8 rounded-lg lg:mx-8 xl:mx-auto max-w-7xl sm:px-16 md:px-24 lg:py-18">
        <div class="flex flex-col max-w-5xl pb-8 mx-auto mb-8 overflow-hidden rounded">
            <section class="relative text-gray-600 body-font">
                <div class="container px-5 py-8 mx-auto">
                    <div class="flex flex-col w-full mb-4 text-center">
                        <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-5xl title-font">{{__('Serveur Discord')}}</h1>
                    </div>
                    <div class="mx-auto lg:w-1/1 md:w-1/1">
                    <h2 class="mb-2 text-2xl font-bold text-blue-500 title-font">{{__('Discutez entre joueurs')}}</h2>
                    <div class="text-white mb-4">
                    {{__('Venez discuter entre membres du site GoKDO.com sur notre serveur Discord.')}} 
                    </div>
                    <h2 class="mb-1 text-2xl font-bold text-blue-500 title-font">{{__("Espace d'entraide")}}</h2>
                    <div class="text-white mb-4">
                    {{__("Cet espace vous permet également de vous entraider entre joueurs.")}} <br>
                    </div>
                    <h2 class="mb-1 text-2xl font-bold text-blue-500 title-font">{{__('Comment se rendre sur le serveur ?')}}</h2>
                    <div class="text-white mb-4">
                    {{__("Il vous suffit de télécharger")}} <a href="https://discord.com/downloa" target="_blank" style="color:yellow; font-weight:bold;">{{__('Discord sur PC')}}</a> {{__('ou')}} <a href="https://play.google.com/store/apps/details?id=com.discord" target="_blank" style="color:yellow; font-weight:bold;">{{__('sur votre Mobile')}}</a>{{__(", de vous inscrire. Une fois que vous détenez un compte Discord, il vous suffira de cliquer sur le logo ci-dessous et vous pourrez alors communiquer avec l'équipe et les membres du site.")}}
                    </div>
                    SERVER CREATION IN PROGRESS...
                    <div class="center text-center"><i class="fab fa-10x fa-discord" style="color:yellow;"></i></div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
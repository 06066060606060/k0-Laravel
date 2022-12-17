{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
@include('backpack-database-notifications::sidebarMenuItem')

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i>
        {{ trans('backpack::base.dashboard') }}</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('games') }}"><i class="nav-icon las la-gamepad"></i></i>
        Jeux</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i>
        <span>Utilisateurs</span></a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('scores') }}"><i class="nav-icon la la-trophy"></i>
        Scores</a></li>



<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-cog"></i> Parametres</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('elfinder') }}"><i
                    class="nav-icon la la-files-o"></i> <span>Fichiers</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('pages') }}"><i class="nav-icon la la-file"></i>
                Pages</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('backup') }}"><i
                    class="nav-icon la la-hdd-o"></i> Sauvegarde</a></li>
    </ul>
</li>

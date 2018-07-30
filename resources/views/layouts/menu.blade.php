<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>Usuarios</span></a>
</li>

<li class="{{ Request::is('excel*') ? 'active' : '' }}">
    <a href="{!! route('excel.create') !!}"><i class="fa fa-edit"></i><span>Importar archivo de excel</span></a>
</li>

<li class="treeview">
    <a href="#">
        <i class="fa fa-list"></i>
        <span>Roles y permisos</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('roles*') ? 'active' : '' }}">
            <a href="{!! route('roles.index') !!}"><i class="fa fa-edit"></i><span>Roles</span></a>
        </li>
        
        <li class="{{ Request::is('permisos*') ? 'active' : '' }}">
            <a href="{!! route('permisos.index') !!}"><i class="fa fa-edit"></i><span>Permisos</span></a>
        </li>
    </ul>
</li>

<li class="treeview">
    <a href="#">
        <i class="fa fa-list"></i>
        <span>Asignaciones</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('permissionsToRol*') ? 'active' : '' }}">
            <a href="{!! route('permissionsToRol.create') !!}"><i class="fa fa-edit"></i><span>Asignar permisos a rol</span></a>
        </li>
        
        <li class="{{ Request::is('rolesToUser*') ? 'active' : '' }}">
            <a href="{!! route('rolesToUser.create') !!}"><i class="fa fa-edit"></i><span>Asignar roles a usuario</span></a>
        </li>
    </ul>
</li>
<div class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>
                <li class="nav-label">Admin</li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Tienda</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">Departamentos </a></li>
                        <li><a href="#">Ciudades </a></li>
                        <li><a href="#">Estados Productos </a></li>
                        <li><a href="{{ route('estadospedidos.index') }}">Estados Pedidos </a></li>
                        <li><a href="{{ route('metodos.index') }}">Métodos de Pago </a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-envelope"></i><span class="hide-menu">Productos</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">Categorias</a></li>
                        <li><a href="{{ route('productos.index') }}">Productos</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Usuarios</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('perfiles.index') }}">Perfiles</a></li>
                        <li><a href="#">Usuarios</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-shopping-cart"></i><span class="hide-menu">Pedidos </span></a>
                </li>
				<li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-bar-chart"></i><span class="hide-menu">Reportes </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">Ventas</a></li>
                        <li><a href="#">Productos</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</div>
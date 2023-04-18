@php($page = Request::segment(1))


<ul id="side-menu">

    <li class="menu-title">MENÚ</li>


    <li>
      <a href="#email" data-bs-toggle="collapse">
          <i class="mdi mdi-view-dashboard"></i>
          <span> Dashboard </span>
          <span class="menu-arrow"></span>
      </a>
      <div class="collapse" id="email">
          <ul class="nav-second-level">
              <li>
                <a href="{{ Asset(env('user') . '/home') }}" >Inicio</a>
              </li>
              <li>
                <a href="{{ Asset(env('user') . '/setting') }}" class=" menu-link">Configuración</a>
              </li>
          </ul>
      </div>

    <li>
      <a href="#sidebarAuth" data-bs-toggle="collapse">
          <i class="mdi mdi-file-multiple"></i>
          <span> Catálogo </span>
          <span class="menu-arrow"></span>
      </a>
      <div class="collapse" id="sidebarAuth">
          <ul class="nav-second-level">
              <li>
                <a href="{{ Asset(env('user') . '/category') }}" class=" menu-link">Categoría</a>
              </li>
              <li>
                <a href="{{ Asset(env('user') . '/item') }}" class=" menu-link">Productos</a>
              </li>
              <li>
                <a href="{{ Asset(env('user') . '/addon') }}" class=" menu-link">Complementos</a>
              </li>
           
          </ul>
      </div>
  </li>



    <li>
        <a href="{{ Asset(env('user') . '/delivery') }}" class=" menu-link">
            <i class="mdi mdi-calendar"></i>
            <span> Personal de entrega </span>
        </a>
    </li>
    <li>
      <a href="#sidebarExpages" data-bs-toggle="collapse">
          <i class="mdi mdi-layers"></i>
          <span> Gestionar pedidos                              </span>
          <span class="menu-arrow"></span>
      </a>
      <div class="collapse" id="sidebarExpages">
          <ul class="nav-second-level">
              <li>
                  <a href="pages-starter.html">Starter</a>
              </li>
              <li>
                  <a href="pages-pricing.html">Pricing</a>
              </li>
              <li>
                  <a href="pages-timeline.html">Timeline</a>
              </li>
              <li>
                  <a href="pages-invoice.html">Invoice</a>
              </li>
              <li>
                  <a href="pages-faqs.html">FAQs</a>
              </li>
              <li>
                  <a href="pages-gallery.html">Gallery</a>
              </li>
              <li>
                  <a href="pages-404.html">Error 404</a>
              </li>
              <li>
                  <a href="pages-500.html">Error 500</a>
              </li>
              <li>
                  <a href="pages-maintenance.html">Maintenance</a>
              </li>
              <li>
                  <a href="pages-coming-soon.html">Coming Soon</a>
              </li>
          </ul>
      </div>
  </li>

    <li>
        <a href="apps-chat.html">
            <i class="mdi mdi-forum"></i>
            <span> Reportes </span>
        </a>
    </li>
    <li class="menu-title mt-2">USUARIO</li>
    <li>
      <a href="apps-chat.html">
          <i class="mdi mdi-forum"></i>
          <span> Cerrar sesión </span>
      </a>
  </li>

</ul>

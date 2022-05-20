<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-item ">
                        <a class="nav-link" href="{{url('dashboard')}}"><i class="fab fa-fw fa-wpforms"></i>Dashboard</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{url('category')}}"><i class="fab fa-fw fa-wpforms"></i>Category</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{url('sub-category')}}"><i class="fab fa-fw fa-wpforms"></i>Sub Category</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{url('product')}}"><i class="fab fa-fw fa-wpforms"></i>Product</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fab fa-fw fa-wpforms"></i>Forms</a>
                        <div id="submenu-4" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('form-elements') }}">Form Elements</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/form-validation.html">Parsely Validations</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/multiselect.html">Multiselect</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/datepicker.html">Date Picker</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/bootstrap-select.html">Bootstrap Select</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>

<div class="vertical-menu mm-active">

    <div data-simplebar="init" class="h-100 mm-show"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: -16.8px; bottom: 0px;"><div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 0px;">

                            <!--- Sidemenu -->
                            <div id="sidebar-menu" class="mm-active">
                                <!-- Left Menu Start -->
                                <ul class="metismenu list-unstyled mm-show" id="side-menu">
                                    <li class="menu-title" data-key="t-menu">Menu</li>

                                    <li class="mm-active">
                                        <a href="index.html" class="active">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                            <span data-key="t-dashboard">Dashboard</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                                            <span data-key="t-apps">Option</span>
                                        </a>
                                        <ul class="sub-menu mm-collapse" aria-expanded="false">

                                            <li>
                                                <a href="javascript: void(0);" class="has-arrow">
                                                    <span data-key="t-email">User</span>
                                                </a>
                                                <ul class="sub-menu mm-collapse" aria-expanded="false">
                                                    <li><a href="{{ route('user.index') }}" data-key="t-inbox">List</a></li>
                                                    <li><a href="{{ route('user.create') }}" data-key="t-read-email">Create</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="javascript: void(0);" class="has-arrow">
                                                    <span data-key="t-invoices">Category</span>
                                                </a>
                                                <ul class="sub-menu mm-collapse" aria-expanded="false">
                                                    <li><a href="{{route('categorie.index')}}" data-key="t-invoice-list">category list</a></li>
                                                    <li><a href="{{route('categorie.create')}}" data-key="t-invoice-detail">Add new</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="javascript: void(0);" class="has-arrow">
                                                    <span data-key="t-contacts">Products</span>
                                                </a>
                                                <ul class="sub-menu mm-collapse" aria-expanded="false">
                                                    <li><a href="{{route('product.index')}}" data-key="t-user-grid">Product List</a></li>
                                                    <li><a href="{{route('product.create')}}" data-key="t-user-list"> Add Product</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="javascript: void(0);" class="has-arrow">
                                                    <span data-key="t-contacts">Boarding</span>
                                                </a>
                                                <ul class="sub-menu mm-collapse" aria-expanded="false">
                                                    <li><a href="{{route('boarding.index')}}" data-key="t-user-grid"> List</a></li>
                                                    <li><a href="{{route('boarding.create')}}" data-key="t-user-list"> Create</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>

                                </ul>


                            </div>
                            <!-- Sidebar -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="simplebar-placeholder" style="width: auto; height: 995px;">

            </div>
        </div>
        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
            <div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;">

            </div>
        </div>
        <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
            <div class="simplebar-scrollbar" style="height: 458px; transform: translate3d(0px, 0px, 0px); display: block;">

            </div>
        </div>
    </div>
</div>

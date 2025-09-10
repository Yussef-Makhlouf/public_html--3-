        <!-- Main sidebar -->
        <div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

            <!-- Sidebar content -->
            <div class="sidebar-content">

                <!-- Sidebar header -->
                <div class="sidebar-section">
                    <div class="sidebar-section-body d-flex justify-content-center">
                        <h5 class="my-auto sidebar-resize-hide flex-grow-1"> {{ __('dashboard/master.sidebar') }} </h5>

                        <div>
                            <button type="button"
                                class="border-transparent btn btn-flat-white btn-icon btn-sm rounded-pill sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                                <i class="ph-arrows-left-right"></i>
                            </button>

                            <button type="button"
                                class="border-transparent btn btn-flat-white btn-icon btn-sm rounded-pill sidebar-mobile-main-toggle d-lg-none">
                                <i class="ph-x"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- /sidebar header -->


                <!-- Main navigation -->
                <div class="sidebar-section">
                    <ul class="nav nav-sidebar" data-nav-type="accordion">

                        <!-- Main -->
                        <li class="pt-0 nav-item-header">
                            <div class="opacity-50 text-uppercase fs-sm lh-sm sidebar-resize-hide">
                                {{ __('dashboard/master.primary') }}
                            </div>
                            <i class="ph-dots-three sidebar-resize-show"></i>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link active">
                                <i class="ph-house"></i>
                                <span>
                                    {{ __('dashboard/master.dashboard') }}
                                    <span class="opacity-50 d-block fw-normal"> {{ __('dashboard/master.home') }}
                                    </span>
                                </span>
                            </a>
                        </li>
                        <!-- Page kits -->
                        <li class="nav-item-header">
                            <div class="opacity-50 text-uppercase fs-sm lh-sm sidebar-resize-hide">
                                {{ __('dashboard/master.control_items') }}
                            </div>
                            <i class="ph-dots-three sidebar-resize-show"></i>
                        </li>

                        <li class="nav-item">
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link">
                                <i class="ph-user"></i>
                                <span> {{ __('dashboard/master.admins') }}
                                </span>
                            </a>
                            <ul class="nav-group-sub collapse">
                                <li class="nav-item">
                                    <a href="{{ route('admins.index') }}" class="nav-link">
                                        {{ __('dashboard/master.add_admin') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admins.create') }}" class="nav-link">
                                        {{ __('dashboard/master.view_admins') }}
                                    </a>
                                </li>
                            </ul>
                        </li>
                        </li>

                        <li class="nav-item">
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link">
                                <i class="ph-folder-open"></i>
                                <span>{{ __('dashboard/master.categories') }}</span>
                            </a>
                            <ul class="nav-group-sub collapse">
                                <li class="nav-item">
                                    <a href="{{ route('categories.index') }}" class="nav-link">
                                        {{ __('dashboard/master.view_categories') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('categories.create') }}" class="nav-link">
                                        {{ __('dashboard/master.add_category') }}
                                    </a>
                                </li>
                            </ul>
                        </li>
                        </li>


                        <li class="nav-item">
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link">
                                <i class="ph-handshake"></i>
                                <span>{{ __('dashboard/master.services') }}</span>
                            </a>
                            <ul class="nav-group-sub collapse">
                                <li class="nav-item">
                                    <a href="{{ route('services.index') }}" class="nav-link">
                                        {{ __('dashboard/master.view_services') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('services.create') }}" class="nav-link">
                                        {{ __('dashboard/master.add_service') }}</a>
                                </li>
                            </ul>
                        </li>
                        </li>

                        <li class="nav-item">
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link">
                                <i class="ph-calendar-check"></i>
                                <span>{{ __('dashboard/master.projects') }}</span>
                            </a>
                            <ul class="nav-group-sub collapse">
                                <li class="nav-item">
                                    <a href="{{ route('projects.index') }}" class="nav-link">
                                        {{ __('dashboard/master.view_projects') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('projects.create') }}" class="nav-link">
                                        {{ __('dashboard/master.add_project') }}
                                    </a>
                                </li>
                            </ul>
                        </li>
                        </li>

                        <li class="nav-item">
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link">
                                <i class="ph-archive-box"></i>
                                <span>{{ __('dashboard/master.products') }}</span>
                            </a>
                            <ul class="nav-group-sub collapse">
                                <li class="nav-item">
                                    <a href="{{ route('products.index') }}" class="nav-link">
                                        {{ __('dashboard/master.view_products') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('products.create') }}"
                                        class="nav-link">{{ __('dashboard/master.add_product') }}
                                    </a>
                                </li>
                            </ul>
                        </li>
                        </li>

                        <li class="nav-item">
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link">
                                <i class="ph-git-branch"></i>
                                <span>{{ __('dashboard/master.branches') }}</span>
                            </a>
                            <ul class="nav-group-sub collapse">
                                <li class="nav-item">
                                    <a href="{{ route('branches.index') }}" class="nav-link">
                                        {{ __('dashboard/master.view_branches') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('branches.create') }}"
                                        class="nav-link">{{ __('dashboard/master.add_branch') }}</a>
                                </li>
                            </ul>
                        </li>
                        </li>

                        <li class="nav-item">
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link">
                                <i class="ph-newspaper-clipping"></i>
                                <span> {{ __('dashboard/master.posts') }}
                                </span>
                            </a>
                            <ul class="nav-group-sub collapse">
                                <li class="nav-item">
                                    <a href="{{ route('blogs.index') }}" class="nav-link">
                                        {{ __('dashboard/master.view_posts') }} </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('blogs.create') }}" class="nav-link">
                                        {{ __('dashboard/master.add_post') }} </a>
                                </li>
                            </ul>
                        </li>
                        </li>

                        <li class="nav-item">
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link">
                                <i class="ph-info"></i>
                                <span>{{ __('dashboard/master.about_us') }}</span>
                            </a>
                            <ul class="nav-group-sub collapse">
                                <li class="nav-item">
                                    <a href="{{ route('about_us.index') }}" class="nav-link">
                                        {{ __('dashboard/master.view') }} </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('about_us.create') }}" class="nav-link">
                                        {{ __('dashboard/master.add') }} </a>
                                </li>
                            </ul>
                        </li>
                        </li>

                        <li class="nav-item">
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link">
                                <i class="ph-users-four"></i>
                                <span>{{ __('dashboard/master.our_clients') }}</span>
                            </a>
                            <ul class="nav-group-sub collapse">
                                <li class="nav-item">
                                    <a href="{{ route('our-clients.index') }}" class="nav-link">
                                        {{ __('dashboard/master.view') }} </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('our-clients.create') }}" class="nav-link">
                                        {{ __('dashboard/master.add') }} </a>
                                </li>
                            </ul>
                        </li>
                        </li>
                        <li class="nav-item">
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link">
                                <i class="ph-chat-centered-dots"></i>
                                <span>{{ __('dashboard/master.reviews') }}</span>
                            </a>
                            <ul class="nav-group-sub collapse">
                                <li class="nav-item">
                                    <a href="{{ route('reviews.index') }}" class="nav-link">
                                        {{ __('dashboard/master.view') }} </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('reviews.create') }}" class="nav-link">
                                        {{ __('dashboard/master.add') }} </a>
                                </li>
                            </ul>
                        </li>
                        </li>
                        <li class="nav-item">
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link">
                                <i class="ph-envelope-simple-open"></i>
                                <span>{{ __('dashboard/master.contacts') }}</span>
                            </a>
                            <ul class="nav-group-sub collapse">
                                <li class="nav-item">
                                    <a href="{{ route('contacts.index') }}" class="nav-link">
                                        {{ __('dashboard/master.view') }} </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('contacts.create') }}" class="nav-link">
                                        {{ __('dashboard/master.add') }} </a>
                                </li>
                            </ul>
                        </li>
                        </li>
                        <!--<li class="nav-item">-->
                        <!--<li class="nav-item nav-item-submenu">-->
                        <!--    <a href="#" class="nav-link">-->
                        <!--        <i class="ph-microsoft-powerpoint-logo"></i>-->
                        <!--        <span>{{ __('dashboard/master.pdfs') }}</span>-->
                        <!--    </a>-->
                        <!--    <ul class="nav-group-sub collapse">-->
                        <!--        <li class="nav-item">-->
                        <!--            <a href="{{ route('pdfs.index') }}" class="nav-link">-->
                        <!--                {{ __('dashboard/master.view') }} </a>-->
                        <!--        </li>-->
                        <!--        <li class="nav-item">-->
                        <!--            <a href="{{ route('pdfs.create') }}" class="nav-link">-->
                        <!--                {{ __('dashboard/master.add') }} </a>-->
                        <!--        </li>-->
                        <!--    </ul>-->
                        <!--</li>-->
                        <!--</li>-->
                        <li class="nav-item">
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link">
                                <i class="ph-shopping-cart"></i>
                                <span>{{ __('dashboard/master.purchase') }}</span>
                            </a>
                            <ul class="nav-group-sub collapse">
                                <li class="nav-item">
                                    <a href="{{ route('buys.index') }}" class="nav-link">
                                        {{ __('dashboard/master.view') }} </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('buys.create') }}" class="nav-link">
                                        {{ __('dashboard/master.add') }} </a>
                                </li>
                            </ul>
                        </li>
                        </li>
                        <li class="nav-item">
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link">
                                <i class="ph-calendar"></i>
                                <span>{{ __('dashboard/master.reservations') }}</span>
                            </a>
                            <ul class="nav-group-sub collapse">
                                <li class="nav-item">
                                    <a href="{{ route('reservations.index') }}" class="nav-link">
                                        {{ __('dashboard/master.view') }} </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('reservations.create') }}" class="nav-link">
                                        {{ __('dashboard/master.add') }} </a>
                                </li>
                            </ul>
                        </li>
                        </li>
                        <li class="nav-item">
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link">
                                <i class="ph-tag"></i>
                                <span> {{ __('dashboard/master.special_offers') }}</span>
                            </a>
                            <ul class="nav-group-sub collapse">
                                <li class="nav-item">
                                    <a href="{{ route('special_offers.index') }}" class="nav-link">
                                        {{ __('dashboard/master.view') }} </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('special_offers.create') }}" class="nav-link">
                                        {{ __('dashboard/master.add') }} </a>
                                </li>
                            </ul>
                        </li>
                        </li>

                    </ul>
                    </li>
                    </ul>
                    <!-- /page kits -->
                    </ul>
                </div>
                <!-- /main navigation -->

            </div>
            <!-- /sidebar content -->

        </div>
        <!-- /main sidebar -->

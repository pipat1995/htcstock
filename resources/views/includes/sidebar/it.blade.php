<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src" ></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                    data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">{{ __('itsidebar.report') }}</li>
                <li>
                    <a href="{{url('it/dashboard')}}" class="{{Helper::isActive('it/dashboard')}}">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        {{ __('itsidebar.dashboard') }}
                    </a>
                </li>
                <li class="app-sidebar__heading">{{ __('itsidebar.actions') }}</li>
                <li class="{{Helper::isActive('it/equipment*')}}">
                    <a href="#" class="{{Helper::isActive('it/equipment*')}}">
                        <i class="metismenu-icon pe-7s-diamond"></i>
                        {{ __('itsidebar.accessorie') }}
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        @can('for-superadmin-admin')
                        <li>
                            <a href="{{route('it.equipment.management.index')}}"
                                class="{{Helper::isActive('it/equipment/management*') }}">
                                <i class="metismenu-icon">
                                </i>{{ __('itsidebar.manage_accessorie') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{route('it.equipment.buy.index')}}" class="{{Helper::isActive('it/equipment/buy*')}}">
                                <i class="metismenu-icon"></i>
                                {{ __('itsidebar.buy') }}
                            </a>
                        </li>
                        @endcan

                        <li>
                            <a href="{{route('it.equipment.requisition.index')}}" class="{{Helper::isActive('it/equipment/requisition*')}}">
                                <i class="metismenu-icon"></i>
                                {{ __('itsidebar.requisition') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{route('it.equipment.lendings.index')}}" class="{{Helper::isActive('it/equipment/lendings*')}}">
                                <i class="metismenu-icon"></i>
                                {{ __('itsidebar.lend') }}
                            </a>
                        </li>
                    </ul>
                </li>
                @can('for-superadmin-admin')
                <li class="{{Helper::isActive('it/check/*')}}">
                    <a href="#" class="{{Helper::isActive('it/check/*')}}">
                        <i class="metismenu-icon pe-7s-car"></i>
                        {{ __('itsidebar.check') }}
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('it.check.transactions_list')}}"
                                class="{{Helper::isActive('it/check/transactions')}}">
                                <i class="metismenu-icon">
                                </i>{{ __('itsidebar.history') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{route('it.check.stocks_list')}}"
                                class="{{Helper::isActive('it/check/stocks') }}">
                                <i class="metismenu-icon">
                                </i>{{ __('itsidebar.stock') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{route('it.check.budgets.index')}}"
                                class="{{Helper::isActive('it/check/budgets') }}">
                                <i class="metismenu-icon">
                                </i>{{ __('itsidebar.budgets-manage') }}
                            </a>
                        </li>
                    </ul>
                </li>
                @endcan
            </ul>
        </div>
    </div>
</div>
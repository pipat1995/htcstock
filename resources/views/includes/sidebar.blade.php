<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
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
                <li class="app-sidebar__heading">รายงาน</li>
                <li>
                    <a href="{{route('dasborad')}}" class="{{ request()->routeIs('dasborad') ? 'mm-active' : ''}}">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Dashboard Report
                    </a>
                </li>
                <li class="app-sidebar__heading">การทำงาน</li>
                <li class="{{ request()->routeIs('transactions.*') ? 'mm-active' : ''}}">
                    <a href="#" class="{{ request()->routeIs('transactions.*') ? 'mm-active' : ''}}">
                        <i class="metismenu-icon pe-7s-diamond"></i>
                        อุปกรณ์
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('transactions.buy.list')}}"
                                class="{{ request()->routeIs('transactions.buy.*') ? 'mm-active' : ''}}">
                                <i class="metismenu-icon"></i>
                                ซื้อ
                            </a>
                        </li>
                        <li>
                            <a href="{{route('transactions.requisition.list')}}"
                                class="{{ request()->routeIs('transactions.requisition.*') ? 'mm-active' : ''}}">
                                <i class="metismenu-icon"></i>
                                เบิก
                            </a>
                        </li>
                        <li>
                            <a href="{{route('transactions.lendings.list')}}"
                                class="{{ request()->routeIs('transactions.lendings.*') ? 'mm-active' : ''}}">
                                <i class="metismenu-icon"></i>
                                ยืม-คืน
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="{{ request()->routeIs('reports.*') ? 'mm-active' : ''}}">
                    <a href="#" class="{{ request()->routeIs('reports.*') ? 'mm-active' : ''}}">
                        <i class="metismenu-icon pe-7s-car"></i>
                        ตรวจสอบ
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('reports.accessories.list')}}"
                                class="{{ request()->routeIs('reports.accessories.list') ? 'mm-active' : ''}}">
                                <i class="metismenu-icon">
                                </i>Transactions
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="metismenu-icon">
                                </i>Stocks
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<script language="javascript" type="text/javascript">
    var timerID = null;
    var timerRunning = false;

    function stopclock() {
        if (timerRunning)
            clearTimeout(timerID);
        timerRunning = false;
    }

    function showtime() {
        var aestTime = new Date().toLocaleString("en-US", {timeZone: "America/Tegucigalpa"});
        var now = new Date(aestTime);
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds()
        var timeValue = "" + ((hours > 12) ? hours - 12 : hours)
        if (timeValue == "0") timeValue = 12;
        timeValue += ((minutes < 10) ? ":0" : ":") + minutes
        timeValue += ((seconds < 10) ? ":0" : ":") + seconds
        timeValue += (hours >= 12) ? " P.M." : " A.M."
        document.clock.face.value = timeValue;
        timerID = setTimeout("showtime()", 1000);
        timerRunning = true;
    }

    function startclock() {
        stopclock();
        showtime();
    }

    window.onload = startclock;
</script>
<div class="sidebar">
    <nav class="sidebar-nav ps ps--active-y">

        <ul class="nav">
            <li class="nav-item nav-logo">
                <img src="{{asset('img/logo.png')}}" alt="logo">
            </li>
            <li class="nav-item">
                <a href="{{ route("admin.products.index") }}"
                   class="nav-link {{ request()->is('admin/products') || request()->is('admin/products/*') ? 'active' : '' }}">
                    <i class="fas fa-cogs nav-icon"></i>
                    {{ trans('global.product.title') }}
                </a>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle">
                    <i class="fas fa-history nav-icon"></i>
                    View History
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="{{ route("clock.view") }}"
                           class="nav-link {{ request()->is('clock/view') || request()->is('clock/view/*') ? 'active' : '' }}" >
                            <i class="fas fa-clock-o nav-icon"></i>
                            View Employee Hours
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#"
                           class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                            <i class="fas fa-shopping-cart nav-icon"></i>
                            View Sales
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#"
                           class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                            <i class="fas fa-bar-chart nav-icon"></i>
                            View Sales Report
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="/" class="nav-link">
                    <i class="nav-icon fas fa-sign-out-alt">
                    </i>
                    Go Home
                </a>
            </li>
        </ul>
        <div class="hero-unit-clock">
            <form name="clock">
                <span color="white"><strong>Time: </strong><br></span>&nbsp;
                <input class="trans" name="face" value="" disabled>
            </form>
        </div>
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; height: 869px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 415px;"></div>
        </div>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>

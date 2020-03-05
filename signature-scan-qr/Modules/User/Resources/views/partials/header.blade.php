<div class="new-topheader ri2-fixed ri2-fullwidth ri2-bgnavy3">
    <a href="index.php" class="ri2-inlineblock ri2-relative new-logo ri2-bgnavy2 ri2-font24 ri2-txwhite1 ri2-paddingleft15 ri2-box ri2-vmid ri2-mobile-hide1">
        <img src="#" alt="logo">
    </a>
    <div class="ri2-inlineblock ri2-vmid ri2-relative new-top55">
        <div class="ri2-table ri2-relative new-top55">
            <div class="ri2-cell ri2-vmid ri2-boxpad10">
                <a class="btn-toogle ri2-relative ri2-bordernone ri2-bgtransparent ri2-txwhite1 ri2-font20 ri2-pointer ri2-tooltip  ri2-nowrap"><span class="ri2-righttooltiptext">Buka Menu</span><i class="fas fa-bars"></i></a>
            </div>
        </div>
    </div>
    <div class="new-topright ri2-floatright">
        @guest

        @else
        <div class="ri2-table ri2-relative ri2-fullheight">
            <div class="ri2-cell ri2-vmid ri2-boxpad10 ri2-box">
            <a href="index.php" class="ri2-tooltip ri2-nowrap ri2-relative ri2-pointer"><span class="ri2-tooltiptext">Lihat Profil</span><img src="{{ asset('clouds/avatars')}}/{{ Auth::user()->photo }}" alt="profile" class="new-top-pp ri2-circle"></a>
            </div>
            <div class="ri2-cell ri2-vmid ri2-boxpad10 ri2-box ri2-mobile-hide2 ri2-txwhite1 ri2-font14 ri2-semibold">
                {{ Auth::user()->name }}
            </div>
            <div class="ri2-cell ri2-vmid ri2-boxpad10 ri2-box ri2-txwhite1 ri2-font14 ri2-relative">
                <div class="ri2-absolute new-bell-dot ri2-font12">
                    <i class="fas fa-circle ri2-txyellow1"></i>
                </div>
                <a class="notification-button ri2-tooltip ri2-nowrap ri2-relative ri2-bordernone ri2-bgtransparent ri2-txwhite1 ri2-font20 ri2-pointer"><span class="ri2-tooltiptext">Notifikasi</span><i class="far fa-bell"></i></a>
            </div>
            <div class="ri2-cell ri2-vmid ri2-boxpad10 ri2-box ri2-txwhite1 ri2-font14">
                <a href="#" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="ri2-tooltip ri2-nowrap ri2-relative ri2-bordernone ri2-bgtransparent ri2-txwhite1 ri2-font20 ri2-pointer"><span class="ri2-lefttooltiptext">Keluar Akun</span><i class="fas fa-sign-out-alt"></i></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
        @endguest
    </div>
</div>
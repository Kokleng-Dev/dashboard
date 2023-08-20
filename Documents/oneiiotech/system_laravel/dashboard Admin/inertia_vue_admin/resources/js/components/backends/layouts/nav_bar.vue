<template>
    <nav class="navbar navbar-expand navbar-light navbar-bg">
        <a class="sidebar-toggle" @click="handleToggleMenu()">
            <i class="hamburger align-self-center"></i>
        </a>

        <div class="navbar-collapse collapse">
            <ul class="navbar-nav navbar-align">
                <li class="nav-item dropdown">
                    <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
                        <div class="position-relative gentle-hover-shake shaking">
                            <i class="far fa-bell text-danger fs-4"></i> 
                            <span class="indicator bg-danger">0</span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
                        <div class="dropdown-menu-header">
                            4 New Notifications
                        </div>
                        <div class="list-group">
                            <a href="#" class="list-group-item">
                                <div class="row g-0 align-items-center">
                                    <div class="col-2">
                                        <i class="text-danger" data-feather="alert-circle"></i>
                                    </div>
                                    <div class="col-10">
                                        <div class="text-dark">
                                            Update completed
                                        </div>
                                        <div class="text-muted small mt-1">
                                            Restart server 12 to complete the
                                            update.
                                        </div>
                                        <div class="text-muted small mt-1">
                                            30m ago
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item">
                                <div class="row g-0 align-items-center">
                                    <div class="col-2">
                                        <i class="text-warning" data-feather="bell"></i>
                                    </div>
                                    <div class="col-10">
                                        <div class="text-dark">Lorem ipsum</div>
                                        <div class="text-muted small mt-1">
                                            Aliquam ex eros, imperdiet vulputate
                                            hendrerit et.
                                        </div>
                                        <div class="text-muted small mt-1">
                                            2h ago
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item">
                                <div class="row g-0 align-items-center">
                                    <div class="col-2">
                                        <i class="text-primary" data-feather="home"></i>
                                    </div>
                                    <div class="col-10">
                                        <div class="text-dark">
                                            Login from 192.186.1.8
                                        </div>
                                        <div class="text-muted small mt-1">
                                            5h ago
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item">
                                <div class="row g-0 align-items-center">
                                    <div class="col-2">
                                        <i class="text-success" data-feather="user-plus"></i>
                                    </div>
                                    <div class="col-10">
                                        <div class="text-dark">
                                            New connection
                                        </div>
                                        <div class="text-muted small mt-1">
                                            Christina accepted your request.
                                        </div>
                                        <div class="text-muted small mt-1">
                                            14h ago
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="dropdown-menu-footer">
                            <a href="#" class="text-muted">Show all notifications</a>
                        </div>
                    </div>
                </li>
                <!-- <li class="nav-item dropdown">
                    <a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
                        <div class="position-relative">
                            <i class="align-middle" data-feather="message-square"></i>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="messagesDropdown">
                        <div class="dropdown-menu-header">
                            <div class="position-relative">4 New Messages</div>
                        </div>
                        <div class="list-group">
                            <a href="#" class="list-group-item">
                                <div class="row g-0 align-items-center">
                                    <div class="col-2">
                                        <img src="@/assets/img/avatars/avatar-5.jpg" class="avatar img-fluid rounded-circle"
                                            alt="Vanessa Tucker" />
                                    </div>
                                    <div class="col-10 ps-2">
                                        <div class="text-dark">
                                            Vanessa Tucker
                                        </div>
                                        <div class="text-muted small mt-1">
                                            Nam pretium turpis et arcu. Duis
                                            arcu tortor.
                                        </div>
                                        <div class="text-muted small mt-1">
                                            15m ago
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item">
                                <div class="row g-0 align-items-center">
                                    <div class="col-2">
                                        <img src="@/assets/img/avatars/avatar-2.jpg" class="avatar img-fluid rounded-circle"
                                            alt="William Harris" />
                                    </div>
                                    <div class="col-10 ps-2">
                                        <div class="text-dark">
                                            William Harris
                                        </div>
                                        <div class="text-muted small mt-1">
                                            Curabitur ligula sapien euismod
                                            vitae.
                                        </div>
                                        <div class="text-muted small mt-1">
                                            2h ago
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item">
                                <div class="row g-0 align-items-center">
                                    <div class="col-2">
                                        <img src="@/assets/img/avatars/avatar-4.jpg" class="avatar img-fluid rounded-circle"
                                            alt="Christina Mason" />
                                    </div>
                                    <div class="col-10 ps-2">
                                        <div class="text-dark">
                                            Christina Mason
                                        </div>
                                        <div class="text-muted small mt-1">
                                            Pellentesque auctor neque nec urna.
                                        </div>
                                        <div class="text-muted small mt-1">
                                            4h ago
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item">
                                <div class="row g-0 align-items-center">
                                    <div class="col-2">
                                        <img src="@/assets/img/avatars/avatar-3.jpg" class="avatar img-fluid rounded-circle"
                                            alt="Sharon Lessman" />
                                    </div>
                                    <div class="col-10 ps-2">
                                        <div class="text-dark">
                                            Sharon Lessman
                                        </div>
                                        <div class="text-muted small mt-1">
                                            Aenean tellus metus, bibendum sed,
                                            posuere ac, mattis non.
                                        </div>
                                        <div class="text-muted small mt-1">
                                            5h ago
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="dropdown-menu-footer">
                            <a href="#" class="text-muted">Show all messages</a>
                        </div>
                    </div>
                </li> -->
                <li class="nav-item dropdown">
                    <a class="nav-flag dropdown-toggle" href="#" id="languageDropdown" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img v-if="$page.props.language == 'en'" src="@/public/assets/img/us.png" alt="English" />
                        <img v-else src="@/public/assets/img/cambo.png" alt="Khmer" />
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
                        <Link v-if="$page.props.language != 'en'" class="dropdown-item" :href="$route('admin.change_language')">
                            <img src="@/public/assets/img/us.png" alt="English" width="20" class="align-middle me-1" />
                            <span class="align-middle">English</span>
                        </Link>
                        <Link v-else class="dropdown-item" :href="$route('admin.change_language')">
                            <img src="@/public/assets/img/cambo.png" alt="English" width="20" class="align-middle me-1" />
                            <span class="align-middle">English</span>
                        </Link>
                    </div>
                </li>
                <li class="nav-item" @click="fullScreenMode()">
                    <a class="nav-icon js-fullscreen d-none d-lg-block" href="#">
                        <div class="position-relative">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-maximize align-middle">
                                <path
                                    d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3">
                                </path>
                            </svg>
                        </div>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                        <i class="align-middle" data-feather="settings"></i>
                    </a>

                    <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                        <img :src="profile" class="avatar img-fluid rounded me-1" />
                        <span class="text-dark">{{ $page.props.auth.name }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#">
                            <i class="far fa-user me-1"></i>
                            {{ __('Profile') }}
                        </a>
                        <div class="dropdown-divider"></div>
                        <button class="dropdown-item" @click.prevent="handleLogout()"> <i class="bi bi-escape"></i> {{ __('Log out') }}</button>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
export default {
    name: "NavBar",
    data() {
        return {
            profile : ''
        }
    },
    mounted(){
        this.imageSrc();
    },
    methods: {
        async imageSrc() {
            this.profile = await this.$file(this.$page.props.auth.photo);
        },
        fullScreenMode() {
            if (
                (document.fullScreenElement &&
                    document.fullScreenElement !== null) ||
                (!document.mozFullScreen && !document.webkitIsFullScreen)
            ) {
                if (document.documentElement.requestFullScreen) {
                    document.documentElement.requestFullScreen();
                } else if (document.documentElement.mozRequestFullScreen) {
                    /* Firefox */
                    document.documentElement.mozRequestFullScreen();
                } else if (document.documentElement.webkitRequestFullScreen) {
                    /* Chrome, Safari & Opera */
                    document.documentElement.webkitRequestFullScreen(
                        Element.ALLOW_KEYBOARD_INPUT
                    );
                } else if (document.msRequestFullscreen) {
                    /* IE/Edge */
                    document.documentElement.msRequestFullscreen();
                }
            } else {
                if (document.cancelFullScreen) {
                    document.cancelFullScreen();
                } else if (document.mozCancelFullScreen) {
                    /* Firefox */
                    document.mozCancelFullScreen();
                } else if (document.webkitCancelFullScreen) {
                    /* Chrome, Safari and Opera */
                    document.webkitCancelFullScreen();
                } else if (document.msExitFullscreen) {
                    /* IE/Edge */
                    document.msExitFullscreen();
                }
            }
        },
        handleLogout(){
            this.$inertia.get(route('admin.logout'));
        },
        handleToggleMenu(){
            $('#sidebar').toggleClass('collapsed')
        }
    },
};
</script>

<style>
.shaking{
    animation-name: jump-shaking;
    animation-duration: 1s;
    animation-iteration-count: infinite;
}
.gentle-hover-shake:hover {
  /* animation: tilt-shaking 0.25s infinite; */
  animation: none;
}

@keyframes tilt-shaking {
    0% { transform: rotate(0deg); }
    25% { transform: rotate(5deg); }
    50% { transform: rotate(0eg); }
    75% { transform: rotate(-5deg); }
    100% { transform: rotate(0deg); }
}
@keyframes tilt-n-move-shaking {
  0% { transform: translate(0, 0) rotate(0deg); }
  25% { transform: translate(5px, 5px) rotate(5deg); }
  50% { transform: translate(0, 0) rotate(0eg); }
  75% { transform: translate(-5px, 5px) rotate(-5deg); }
  100% { transform: translate(0, 0) rotate(0deg); }
}


@keyframes jump-shaking {
  0% { transform: translateX(0) }
  25% { transform: translateY(-9px) }
  35% { transform: translateY(-9px) rotate(17deg) }
  55% { transform: translateY(-9px) rotate(-17deg) }
  65% { transform: translateY(-9px) rotate(17deg) }
  75% { transform: translateY(-9px) rotate(-17deg) }
  100% { transform: translateY(0) rotate(0) }
}
</style>

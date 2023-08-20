<template>
    <nav id="sidebar" class="sidebar js-sidebar">
        <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand">
                <img :src="logo" class="avatar img-fluid rounded-circle me-4" />
                <span class="align-middle">{{ __($page.props.company.name) }}</span>
            </a>

            <ul class="sidebar-nav">
                <template v-for="(route , index) in routes" :key="index">
                    <li v-if="route.isHeader" class="sidebar-header">
                        {{  __(route.title)  }}
                    </li>
                    <li v-else-if="$page.props.permission.includes(route.permission) && route.sub === false" :class="`sidebar-item ${(route.component).split('|').includes($page.component) ? 'active' : ''}`">
                        <Link class="sidebar-link" :href="route.to">
                            <!-- <i class="align-middle" data-feather="sliders"></i>  -->
                            <span v-html="route.icon"></span>
                            <span class="align-middle">{{ __(route.title) }}</span>
                        </Link>
                    </li>
                    <template v-else >
                        <li v-if="$page.props.permission.find((item) => route.permission.split('|').includes(item))" :class="`sidebar-item ${(route.component).split('|').includes($page.component) ? 'active' : ''}`">
                            <a :data-bs-target="`#oneiiotech${index}`" data-bs-toggle="collapse" :class="`sidebar-link ${(route.component).split('|').includes($page.component) ? ' ' : 'collapsed'}`" :aria-expanded="(route.component).split('|').includes($page.component) ? 'true' : 'false'">
                                <!-- <i class="align-middle" data-feather="layout"></i>  -->
                                <span v-html="route.icon"></span>
                                <span class="align-middle">{{ __(route.title) }}</span>
                            </a>
                            <ul :id="`oneiiotech${index}`" :class="`sidebar-dropdown list-unstyled ${(route.component).split('|').includes($page.component) ? 'show' : 'collapse'}`" data-bs-parent="#sidebar">
                                <template v-for="(sub, i) in route.sub" :key="i">
                                    <li v-if="$page.props.permission.includes(sub.permission)" :class="`sidebar-item ${(sub.component).includes($page.component) ? 'active' : ''}`">
                                        <Link class="sidebar-link" :href="sub.to">
                                            {{ __(sub.title) }}
                                            <span v-if="sub.badge" class="sidebar-badge badge bg-primary">{{ sub.badge }}</span>
                                        </Link>
                                    </li>
                                </template>
                            </ul>
                        </li>
                    </template>
                </template>
            </ul>
        </div>
    </nav>
</template>

<script>
import { routes } from '@/routes/web.js';
export default {
    name: 'SideBar',
    data() {
        return {
            routes : routes,
            logo : ''
        }
    },
    methods:{
        async imageSrc() {
            this.logo = await this.$file(this.$page.props.company.logo);
        },
    },
    mounted(){
        this.imageSrc();
    }
}
</script>

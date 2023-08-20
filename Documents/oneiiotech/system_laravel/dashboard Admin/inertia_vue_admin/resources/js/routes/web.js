import {components} from '@/routes/path.js'
import { Ziggy } from '@/ziggy';
import route from 'ziggy-js';

const routes = [
    {
        title : 'Point of Sale',
        isHeader : true
    },
    {
        icon : '<i class="fa fa-home"></i>',
        title : 'Dashboard',
        to : route('admin.home'),
        component : components('home'),
        permission : 'home',
        isHeader : false,
        sub : false
    },
    {
        icon : '<i class="fa fa-cogs"></i>',
        title : 'Settings',
        component : components('company|user|role|permission|role_permission|about_me'),
        permission : 'company|user',
        isHeader : false,
        sub : [
            {
                icon : '',
                title : 'Company Info',
                to : route('admin.company'),
                badge : null,
                component : components('company'),
                permission : 'company_info',
            },
            {
                icon : '',
                title : 'Permission',
                to : route('admin.permission'),
                badge : null,
                component : components('permission'),
                permission : 'permission',
            },
            {
                icon : '',
                title : 'Role',
                to : route('admin.role'),
                badge : null,
                component : components('role|role_permission'),
                permission : 'role',
            },
            {
                icon : '',
                title : 'User',
                to : route('admin.user'),
                badge : null,
                component : components('user'),
                permission : 'user',
            },
            {
                icon : '',
                title : 'About Me',
                to : route('admin.about_me'),
                badge : null,
                component : components('about_me'),
                permission : 'about_me',
            },
        ]
    }
];

export {routes};
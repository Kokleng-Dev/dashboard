const componentPaths = {
    home : 'backends/homes/index',
    company : 'backends/companies/index',
    about_me : 'backends/about_me/index',
    user : 'backends/users/index',
    role : 'backends/roles/index',
    role_permission : 'backends/role_permissions/index',
    permission : 'backends/permissions/index'
};

function components(data){
    const coms = data.split('|');
    let str = '';
    coms.forEach(item => {
        str += componentPaths[item] + "|";
    });
    return str;
}
export { components }
import { DOMAIN, FILE } from "./connection";

function file(url) {
    const path = FILE + '/' + url;
    const fakePath = 'https://t3.ftcdn.net/jpg/05/04/28/96/360_F_504289605_zehJiK0tCuZLP2MdfFBpcJdOVxKLnXg1.jpg';
    return new Promise((resolve, reject) => {
        const img = new Image();        
        img.src = path;
        img.onload = function() {
            if (img.height > 0) {
                resolve(path);
            } else {
                resolve(fakePath);
            }
        };
        img.onerror = function() {
            resolve(fakePath);
        };
    });
}

export { file }
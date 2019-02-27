import axios from 'axios';

// localStorage.setItem('token', 'Bearer Gxv4EEfi3M');
const AUTH_TOKEN = localStorage.getItem('token');

// if (localStorage.getItem('token') == null) {
//     console.log('auth token in null');
//     const AUTH_TOKEN = '';
// } else {
// }


// console.log(AUTH_TOKEN.length);
// console.log(localStorage.getItem('currentUser'));
// localStorage.removeItem("token");
// localStorage.removeItem("currentUser");

export const AXIOS = axios.create({
    headers: {
        'Authorization': AUTH_TOKEN,
    }
});
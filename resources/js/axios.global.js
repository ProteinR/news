import axios from 'axios';

export var USER_AUTH; // bool - true if user authenticated
export var CURRENT_USER; // obj - if user authenticated, contain current user obj
const AUTH_TOKEN = localStorage.getItem('token');

// Check if user authenticated
if (!localStorage.getItem('token')) {
    USER_AUTH = false;
    CURRENT_USER = '';
} else {
    USER_AUTH = true;
    CURRENT_USER  = JSON.parse(localStorage.getItem('currentUser'));
}

export var AXIOS = axios.create({
    headers: {
        'Authorization': AUTH_TOKEN,
    }
});


import axios from 'axios';

const instance = axios.create();
const token = localStorage.getItem('_token');
instance.defaults.withCredentials = false;
if(token) {
    instance.defaults.headers.Authorization = `Bearer ${token}`;
}

export const handleLogin = async (data) => await instance.post('api/auth/login', data);
export const handleOauthRedirect = async(provider) => await instance.post(`api/auth/${provider}`);
export const handleLogout = async () => await instance.post('api/auth/logout');
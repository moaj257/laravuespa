import axios from 'axios';

const instance = axios.create();

instance.defaults.withCredentials = true;

export const handleLogin = async (data) => await instance.post('api/auth/login', data);
export const handleLogout = async () => await instance.post('api/auth/logout');
import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Gracefully handle 419 (CSRF Token / Session Expired) on AJAX requests
window.axios.interceptors.response.use(
    (response) => response,
    (error) => {
        if (error.response && error.response.status === 419) {
            // Automatically reload the page to refresh CSRF token without alarming the user
            window.location.reload();
        }
        return Promise.reject(error);
    }
);

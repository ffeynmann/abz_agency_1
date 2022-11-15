import axios from "axios";
import {Notify} from "quasar";

axios.interceptors.response.use(response => {
    return response;
}, error => {
    let errorMessage = '';

    if(error.response?.status == 422) {
        return Promise.reject(error);
    }

    error.code === 'ECONNABORTED' && (errorMessage = 'Server Error (Timeout)');
    error.response?.status === 500 && (errorMessage = 'Server Error (500)');
    error.response?.data?.message  && (errorMessage = error.response.data.message);

    errorMessage.length && Notify.create({
        color: 'red',
        message: errorMessage
    })

    return Promise.reject(error);
})

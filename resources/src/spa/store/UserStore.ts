import {UserInterface} from "@spa/interfaces/UserInterface";
import {reactive, ref, } from "vue";
import axios from "axios";


export const initialUser:UserInterface = {id: 0, name: '', email: '', phone: '',position_id: '', photo: null}

const validationErrors = ref({});
const user = reactive({...initialUser});

const createUser = () => {
    return new Promise(async (resolve, reject) => {
        validationErrors.value = {};

        axios.get('/api/v1/token').then(async response => {
            let token = response.data.token;

            try {
                let formData = new FormData();
                formData.append('name', user.name);
                formData.append('email', user.email);
                formData.append('phone', user.phone);
                formData.append('position_id', user.position_id);
                formData.append('photo', user.photo);

                await axios.post('/api/v1/users', formData, {
                    headers: {
                        token,
                        "Content-Type": "multipart/form-data",
                    }
                });

                Object.assign(user, initialUser);
                resolve(true);
            } catch (e) {
                if (e.response?.status === 422) {
                    validationErrors.value = e.response.data.fails
                }

                reject(e);
            }
        })
    });
}


export default function () {
    return {
        validationErrors,
        user,
        createUser,
    }
}

import {reactive, ref} from "vue";
import axios from "axios";
import {UserInterface, UserPaginationInterface} from "@spa/interfaces/UserInterface";

const initialQueryParams:UserPaginationInterface = {page: 1, offset: null, count: null}

const isLoading = ref(false);
const totalPages  = ref(0);
const queryParams = reactive({...initialQueryParams});
const users = ref<UserInterface[]>([]);

const getUsers = async () => {
    isLoading.value = true;

    let response = await axios.get('api/v1/users', {params: queryParams});
    users.value = response.data.users;
    totalPages.value = response.data.total_pages;

    isLoading.value = false;
}

export default function(){
    return {
        isLoading,
        totalPages,
        queryParams,
        users,
        getUsers
    }
}

<script setup lang="ts">
import UserStore, {initialUser} from "@spa/store/UserStore";
import {onMounted} from "vue";
import {router} from "@spa/router";


const {user, createUser, validationErrors} = UserStore();

const create = async () => createUser().then(router.back);

onMounted(() => {
    Object.assign(user, initialUser);
    validationErrors.value = {};
});

</script>

<template>
    <div class="flex flex-center">
        <div class="q-pa-md full-width" style="max-width: 600px">
            <h5 class="text-center text-weight-medium q-my-xs">
                User Registration
            </h5>
            <q-form class="q-pa-md" @submit.prevent="create">
                <q-input v-model="user.name" label="Name" filled
                         :error="!!validationErrors['name']?.length"
                         :error-message="validationErrors['name']?.join('<br />')"
                >
                </q-input>

                <q-input v-model="user.email" label="Email" filled
                         :error="!!validationErrors['email']?.length"
                         :error-message="validationErrors['email']?.join('<br />')"
                >
                </q-input>

                <q-input v-model="user.phone" label="Phone" filled
                         mask="380#########" fill-mask
                         :error="!!validationErrors['phone']?.length"
                         :error-message="validationErrors['phone']?.join('<br />')"
                >
                </q-input>

                <q-input v-model="user.position_id" label="Position Id" filled
                         :error="!!validationErrors['position_id']?.length"
                         :error-message="validationErrors['position_id']?.join('<br />')"
                >
                </q-input>

                <q-file filled v-model="user.photo" label="Photo"
                        :error="!!validationErrors['photo']?.length"
                        :error-message="validationErrors['photo']?.join('\n')"
                />

                <div class="flex justify-end">
                    <q-btn flat type="submit" color="primary">REGISTER</q-btn>
                </div>
            </q-form>
        </div>
    </div>
</template>

<style lang="scss" scoped>

</style>

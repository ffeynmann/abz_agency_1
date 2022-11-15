<script setup lang="ts">
    import  {onMounted, watch} from "vue";
    import UsersStore from "@spa/store/UsersStore";

    const {users, queryParams, getUsers, totalPages, isLoading} = UsersStore();

    watch(queryParams, () => {
        getUsers();
    });

    onMounted(getUsers);
</script>

<template>
    <div class="flex flex-center">
        <div class="q-pa-md full-width" style="max-width: 1200px">
            <q-table :rows="users"
                     title="Users"
                     binary-state-sort
                     dense
                     :loading="isLoading"
                     :rows-per-page-options="[0]"
                     hide-bottom
            >
            </q-table>
            <div class=""></div>
            <div class="q-ma-md flex flex-center">
                <q-pagination :max="Number(totalPages)" max-pages="7" boundary-numbers v-model="queryParams.page"></q-pagination>
            </div>
        </div>
    </div>

</template>

<style lang="scss" scoped>

</style>

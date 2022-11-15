<script setup>

</script>

<template>
    <q-layout>
        <q-header reveal elevated>
            <q-toolbar class="bg-primary text-white">
                <q-toolbar-title>ABZ_AGENCY_TEST_1</q-toolbar-title>

                <q-separator dark vertical />
                <q-btn stretch :to="{name: 'home'}" flat label="Users" />
                <q-separator dark vertical />
                <q-btn stretch :to="{name: 'user_create'}" flat label="User Create" />
            </q-toolbar>
        </q-header>

        <q-page-container>
            <router-view></router-view>
        </q-page-container>
    </q-layout>

</template>

<style lang="scss" scoped>

</style>

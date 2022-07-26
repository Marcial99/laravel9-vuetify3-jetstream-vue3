<script setup>
import { ref } from "vue";
import { Inertia } from "@inertiajs/inertia";
import NavigationDrawerLink from "@/Components/NavigationDrawerLink.vue";
import SubmenuTabLink from "@/Components/SubmenuTabLink.vue";

const nav = ref(true);

const logout = () => {
    Inertia.post(route("logout"), {
        onSuccess: () => {
            location.reload();
        },
    });
};
</script>
<template>
    <!-- App.vue -->

    <v-app>
        <v-navigation-drawer app v-model="nav" color="light">
            <!-- -->

            <v-list bg-color="light">
                <NavigationDrawerLink
                    ruta="dashboard"
                    icon="mdi-account"
                    title="Home 1"
                    color="indigo"
                />
                <NavigationDrawerLink
                    ruta="gas.captura"
                    icon="mdi-fire"
                    title="Módulo de gas"
                    color="indigo"
                />
                <NavigationDrawerLink
                    ruta="dashboard2"
                    icon="mdi-home"
                    title="Home 2"
                    color="indigo"
                />
            </v-list>
        </v-navigation-drawer>

        <v-app-bar app color="indigo" dark>
            <!-- -->
            <v-app-bar-nav-icon @click="nav = !nav">
                <v-icon icon="mdi-menu" />
            </v-app-bar-nav-icon>
            <v-app-bar-title>
                <slot name="title"></slot>
            </v-app-bar-title>
            <template v-slot:extension>
                <v-tabs>
                    <slot name="tabs"></slot>
                </v-tabs>
            </template>
            <template v-slot:append>
                <v-menu location="start" bottom offset-y rounded>
                    <template v-slot:activator="{ props }">
                        <v-btn icon v-bind="props">
                            <v-avatar color="brown" size="large">
                                <span class="white--text text-h5">JM</span>
                            </v-avatar>
                        </v-btn>
                    </template>

                    <v-list>
                        <form method="POST" @submit="logout">
                            <v-list-item @click="logout" link>
                                <v-list-item-title> Log out </v-list-item-title>
                            </v-list-item>
                        </form>
                    </v-list>
                </v-menu>
            </template>
        </v-app-bar>

        <!-- Sizes your content based upon application components -->
        <v-main>
            <!-- Provides the application the proper gutter -->
            <v-container fluid>
                <slot name="main"> </slot>
            </v-container>
        </v-main>

        <v-footer app>
            <!-- -->
        </v-footer>
    </v-app>
</template>
<style scoped></style>

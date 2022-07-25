<script>
import { Inertia } from "@inertiajs/inertia";
import { Head, Link } from "@inertiajs/inertia-vue3";

export default {
    data() {
        return {
            nav: true,
            items: [
                { title: "Click Me" },
                { title: "Click Me" },
                { title: "Click Me" },
                { title: "Click Me 2" },
            ],
        };
    },
    methods: {
        logout() {
            Inertia.post(route("logout"), {
                onSuccess: () => {
                    location.reload();
                },
            });
        },
    },
};
</script>
<template>
    <!-- App.vue -->

    <v-app>
        <v-navigation-drawer app v-model="nav">
            <!-- -->

            <v-list>
                <v-list-item
                    link
                    @click="
                        this.$inertia.visit(route('dashboard'), {
                            preserveState: true,
                            preserveScroll: true,
                        })
                    "
                >
                    <v-list-item-icon icon="mdi-account"> </v-list-item-icon>
                    <v-list-item-content>Home 1</v-list-item-content>
                </v-list-item>

                <v-list-item
                    link
                    @click="
                        this.$inertia.visit(route('dashboard2'), {
                            preserveState: true,
                            preserveScroll: true,
                        })
                    "
                >
                    <v-list-item-icon icon="mdi-home"> </v-list-item-icon>
                    <v-list-item-content>Home 2</v-list-item-content>
                </v-list-item>
            </v-list>
        </v-navigation-drawer>

        <v-app-bar app color="primary">
            <!-- -->
            <v-app-bar-nav-icon @click="nav = !nav">
                <v-icon icon="mdi-menu" />
            </v-app-bar-nav-icon>
            <v-app-bar-title>
                <slot name="title"></slot>
            </v-app-bar-title>
            <template v-slot:append>
                <v-menu location="start">
                    <template v-slot:activator="{ props }">
                        <v-btn
                            color="light"
                            dark
                            v-bind="props"
                            icon="mdi-dots-vertical"
                        >
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

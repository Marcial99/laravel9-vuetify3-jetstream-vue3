<template>
    <v-list-item
        link
        @click="
            Inertia.visit(route(props.ruta), {
                preserveState: true,
                preserveScroll: false,
            })
        "
        :color="props.color"
        :active="route().current(props.ruta)"
    >
        <v-list-item-icon :icon="props.icon"> </v-list-item-icon>
        <v-list-item-content>{{ props.title }}</v-list-item-content>
    </v-list-item>
</template>

<script setup>
import { Inertia } from "@inertiajs/inertia";
import { Head, Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
    ruta: String,
    icon: String,
    title: String,
    color: String,
});
</script>

<style></style>

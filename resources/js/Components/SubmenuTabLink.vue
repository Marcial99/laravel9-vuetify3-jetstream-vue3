<template>
    <v-tab
        @click="
            Inertia.visit(route(props.ruta), {
                preserveState: true,
                preserveScroll: false,
            })
        "
        :color="props.color"
        :active="route().current(props.ruta)"
        >{{ props.title }}</v-tab
    >
</template>

<script setup>
import { Inertia } from "@inertiajs/inertia";
const props = defineProps({
    ruta: String,
    color: String,
    title: String,
});
</script>

<style></style>

<script setup>
import AppLayoutVuetify from "@/Layouts/AppLayoutVuetify.vue";
import SubmenuTabLink from "@/Components/SubmenuTabLink.vue";
</script>
<template>
    <AppLayoutVuetify>
        <template #title> Modulo de gas </template>
        <template #tabs>
            <SubmenuTabLink ruta="gas.captura" title="Capturar" color="white" />
            <SubmenuTabLink
                ruta="gas.empresas"
                title="Empresas"
                color="white"
            />
        </template>
        <template #main>
            <slot name="main" />
        </template>
    </AppLayoutVuetify>
</template>
<style scoped></style>

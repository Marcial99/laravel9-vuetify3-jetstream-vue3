<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Jetstream/Welcome.vue";
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight"></h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <v-alert color="info" icon="$info">
                        I'm an info alert that uses <strong>color</strong> and
                        <strong>icon</strong> props instead of
                        <strong>type</strong>
                    </v-alert>
                    <Welcome />
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import GasLayout from "@/Layouts/ModuleLayouts/GasLayout.vue";
import { computed, reactive, ref } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { usePage } from "@inertiajs/inertia-vue3";
const flash = computed({
    get: () => usePage().props.value.flash,
});
console.log(flash);
const props = defineProps({
    empresas: Array,
});
const show_form = ref(false);
const snackbar = ref({
    show: false,
    title: "",
    content: "",
});

const form = useForm({
    estatus: false,
    nombre: "",
});
const overlay = ref(false);

const submit = () => {
    overlay.value = true;
    Inertia.post(route("gas.empresas.store"), form, {
        preserveScroll: true,
        onSuccess: () => {
            form.reset("estatus");
            form.reset("nombre");
            show_form.value = false;
            snackbar.value.show = true;
            console.log(flash);
            snackbar.value.title = flash.value.title;
            snackbar.value.message = flash.value.message;
            overlay.value = false;
        },
    });
};
console.log(props.empresas);
</script>
<template>
    <GasLayout>
        <template #main>
            <v-sheet elevation="0">
                <v-btn @click="show_form = !show_form" color="success"
                    >Añadir</v-btn
                >
                <v-dialog v-model="show_form" persistent>
                    <v-card>
                        <v-form @submit.prevent="submit">
                            <v-card-title>
                                <span class="text-h5">Crear empresa</span>
                            </v-card-title>
                            <v-card-text>
                                <v-container>
                                    <v-row>
                                        <v-col cols="12" sm="12" md="12">
                                            <v-text-field
                                                v-model="form.nombre"
                                                label="Nombre"
                                                hint="Nombre de la empresa"
                                                required
                                                hide-details
                                            ></v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="12" md="12">
                                            <v-switch
                                                v-model="form.estatus"
                                                label="Empresa activa"
                                                color="indigo"
                                                value="activa"
                                                hide-details
                                            ></v-switch>
                                        </v-col>
                                    </v-row>
                                </v-container>
                            </v-card-text>
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn
                                    color="red"
                                    text
                                    raised
                                    @click="show_form = false"
                                >
                                    Cerrar
                                </v-btn>
                                <v-btn
                                    color="blue-darken-1"
                                    raised
                                    text
                                    @click="submit"
                                >
                                    Guardar
                                </v-btn>
                            </v-card-actions>
                        </v-form>
                    </v-card>
                </v-dialog>
            </v-sheet>
            <v-sheet elevation="1" class="mt-5">
                <v-table>
                    <thead>
                        <tr>
                            <th class="text-left">Id</th>
                            <th class="text-left">Nombre</th>
                            <th class="text-left">Activa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="empresa in props.empresas" :key="empresa.id">
                            <td>{{ empresa.id }}</td>
                            <td>{{ empresa.nombre }}</td>
                            <td>{{ empresa.estatus }}</td>
                        </tr>
                    </tbody>
                </v-table>
            </v-sheet>

            <v-snackbar v-model="snackbar.show" vertical>
                <div class="text-subtitle-1 pb-2">
                    {{ snackbar.title }}
                </div>

                <p>{{ snackbar.message }}</p>

                <template v-slot:actions>
                    <v-btn
                        color="indigo"
                        variant="text"
                        @click="snackbar.show = false"
                    >
                        Aceptar
                    </v-btn>
                </template>
            </v-snackbar>
            <v-overlay
                :model-value="overlay"
                class="align-center justify-center"
            >
                <v-progress-circular
                    indeterminate
                    size="64"
                ></v-progress-circular>
            </v-overlay>
        </template>
    </GasLayout>
</template>
<style scoped></style>

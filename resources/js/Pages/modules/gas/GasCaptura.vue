<script setup>
import GasLayout from "@/Layouts/ModuleLayouts/GasLayout.vue";
</script>
<template>
    <GasLayout>
        <template #main>
            <v-sheet>
                <v-form>
                    <v-container>
                        <v-row>
                            <v-col cols="6">
                                <v-text-field
                                    type="date"
                                    label="Ingrese la fecha"
                                ></v-text-field>
                            </v-col>
                            <v-col cols="6">
                                <v-text-field
                                    label="Ingrese algo"
                                ></v-text-field>
                            </v-col>
                        </v-row>
                        <v-row>
                            <v-col cols="6">
                                <v-text-field
                                    type="date"
                                    label="Ingrese la fecha"
                                ></v-text-field>
                            </v-col>
                            <v-col cols="6">
                                <v-text-field
                                    label="Ingrese algo"
                                ></v-text-field>
                            </v-col>
                        </v-row>
                        <v-row>
                            <v-col cols="6">
                                <v-text-field
                                    type="date"
                                    label="Ingrese la fecha"
                                ></v-text-field>
                            </v-col>
                            <v-col cols="6">
                                <v-text-field
                                    label="Ingrese algo"
                                ></v-text-field>
                            </v-col>
                        </v-row>
                    </v-container>
                </v-form>
            </v-sheet>
        </template>
    </GasLayout>
</template>
<style scoped></style>

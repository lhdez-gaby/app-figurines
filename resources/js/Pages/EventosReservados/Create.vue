<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    users:Array,
    eventos:Array,
});


const form = useForm({
    user_id: "",
    evento_id: "",
    fecha: new Date(),
    hora: "",
    direccion: "",
    estado: "En espera",
    telefono:"",
});

const submit = () =>{
    form.post(route('miseventosReservados.store'));
};
</script>

<template>
    <Head title="Reservar Evento" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Reservar evento</h2>
        </template>

        <div class="py-12">
            <div class="max-w-md mx-auto sm:px-6 lg:px-8">
                <div class="p-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form @submit.prevent="submit">
            <div>
                <InputLabel for="user_id" value="Contratante" />
                <select 
                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 rounded"
                v-model="user_id" 
                id="user_id" 
                name="user_id">
                    <option v-for="user in users" :key="user.id" :value="user.id">{{ user.name }}</option>
                </select>
            </div>

            <div>
                <InputLabel class="mt-2" for="evento_id" value="Evento" />
                <select 
                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 rounded"
                v-model="evento_id" 
                id="evento_id" 
                name="evento_id">
                    <option v-for="evento in eventos" :key="evento.id" :value="evento.id">{{ evento.nombre }}</option>
                </select>
            </div>

            <div>
                <InputLabel class="mt-2" for="fecha" value="Fecha" />
                <TextInput
                    id="fecha"
                    type="date"
                    class="mt-1 block w-full"
                    v-model="form.fecha"
                    required
                    autofocus
                />

                <InputError class="mt-2" :message="form.errors.fecha" />
            </div>
            <div>
                <InputLabel class="mt-2" for="hora" value="Hora" />
                <TextInput
                    id="hora"
                    type="time"
                    min="8:00" 
                    max="18:00" 
                    step="600"
                    class="mt-1 block w-full"
                    v-model="form.hora"
                    required
                />

                <InputError class="mt-2" :message="form.errors.hora" />
            </div>

            <div>
                <InputLabel class="mt-2" for="direccion" value="Dirección" />
                
                <TextInput
                    id="direccion"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.direccion"
                    required
                />
                <InputError class="mt-2" :message="form.errors.direccion" />
            </div>
            <div>
                <InputLabel class="mt-2" for="telefono" value="Teléfono" />
                
                <TextInput
                    id="telefono"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.telefono"
                    required
                />
                <InputError class="mt-2" :message="form.errors.telefono" />
            </div>
            
            <div class="flex items-center justify-end mt-4">
                <PrimaryButton class="ml-4"  :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            <i class="fa-solid fa-save">
                                Guardar
                            </i>
                        </PrimaryButton>
            </div>
        </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
    nombre:"",
    url_link:""
});

const submit = () =>{
    form.post(route('misvideos.store'));
};
</script>

<template>
    <Head title="Agregar video" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Agregar video</h2>
        </template>

        <div class="py-12">
            <div class="max-w-md mx-auto sm:px-6 lg:px-8">
                <div class="p-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form @submit.prevent="submit">
            <div>
                <InputLabel for="nombre" value="Título" />

                <TextInput
                    id="nombre"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.nombre"
                    required
                    autofocus
                />

                <InputError class="mt-2" :message="form.errors.nombre" />
            </div>
            <div>
                <InputLabel for="url_link" value="Url link" />

                <TextInput
                    id="url_link"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.url_link"
                    required
                />

                <InputError class="mt-2" :message="form.errors.url_link" />
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
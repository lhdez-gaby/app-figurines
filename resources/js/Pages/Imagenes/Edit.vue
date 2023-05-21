<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Inertia } from '@inertiajs/inertia-vue3';


const props = defineProps({
    imagen:Object,
})

const form = useForm({
    nombre:props.imagen?.nombre,
    imagen:""
});

const submit = () =>{
    Inertia.post(`/misimagenes/${props.imagen.id}`,{
        _method:"put",
        nombre: form.nombre,
        imagen: form.imagen,
    })
};
</script>

<template>
    <Head title="Editar imagen" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar imagen</h2>
        </template>

        <div class="py-12">
            <div class="max-w-md mx-auto sm:px-6 lg:px-8">
                <div class="p-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    Titulo:{{  props.imagen?.nombre }}
                    <img :src="props.imagen?.imagen" :alt="props.imagen?.nombre"/>
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
            <div class="mt-2">
                <InputLabel for="imagen" value="Imagen" />

                <TextInput
                    id="imagen"
                    type="file"
                    class="mt-1 block w-full"
                    @input="form.imagen = $event.target.files[0]"
                    required
                />

                <InputError class="mt-2" :message="form.errors.imagen" />
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
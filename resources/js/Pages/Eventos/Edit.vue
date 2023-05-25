<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,useForm,router } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const props = defineProps({
    evento:Object,
});

const form = useForm({
    nombre:props.evento?.nombre,
    imagen:"",
    detalle:props.evento?.detalle,
    precio: props.evento?.precio,
    duracion: props.evento?.duracion,
});

const submit = (id) =>{
    
    router.post('/miseventos/'+id, {
        _method: 'put',
        imagen: form.imagen,
        nombre: form.nombre,
        detalle: form.detalle,
        precio: form.precio,
        duracion: form.duracion,
    });

};
</script>

<template>
    <Head title="Editar evento" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar evento</h2>
        </template>

        <div class="py-12">
            <div class="max-w-md mx-auto sm:px-6 lg:px-8">
                <div class="p-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form @submit.prevent="submit(evento.id)">
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
                    
                />

                <InputError class="mt-2" :message="form.errors.imagen" />
            </div>

            <div>
                <InputLabel class="mt-2" for="precio" value="Precio" />
                <TextInput
                    id="precio"
                    type="number"
                    class="mt-1 block w-full"
                    v-model="form.precio"
                    required
                    
                />

                <InputError class="mt-2" :message="form.errors.precio" />
            </div>
            <div>
                <InputLabel class="mt-2" for="duracion" value="Duración en horas" />
                <TextInput
                    id="duracion"
                    type="number"
                    class="mt-1 block w-full"
                    v-model="form.duracion"
                    required
                    
                />

                <InputError class="mt-2" :message="form.errors.duracion" />
            </div>
            

            <div>
                <InputLabel class="mt-2" for="detalle" value="Descripción" />
                
                <TextInput
                    id="detalle"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.detalle"
                    required
                />
                

                <InputError class="mt-2" :message="form.errors.detalle" />
            </div>
            
            <div class="flex items-center justify-end mt-4">
                <PrimaryButton class="ml-4"  :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            <i class="fa-solid fa-pen">
                                Actualizar
                            </i>
                        </PrimaryButton>
            </div>
        </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
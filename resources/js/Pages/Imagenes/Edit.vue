<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,useForm,router } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
// import { Inertia } from '@inertiajs/inertia-vue3';


const props = defineProps({
    imagen:Object,
})

const form = useForm({
    nombre:props.imagen?.nombre,
    imagen:"",
    _method:'put'
});

const submit = (id) =>{
    
    router.post('/misimagenes/'+id, {
        _method: 'put',
        imagen: form.imagen,
        nombre: form.nombre
    });

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
                    <form @submit.prevent="submit(imagen.id)">
                        
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
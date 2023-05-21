<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,Link,useForm } from '@inertiajs/vue3';
import DangerButton from '@/Components/DangerButton.vue';
import Swal from 'sweetalert2';

defineProps({
    images:Object,
});

const  form = useForm({
    id:''
})

const deleteImagen = (id,name) =>{
    const alerta = Swal.mixin({
        buttonsStyling:true
    });
    alerta.fire({
        title: '¿Está seguro de eliminar '+name+' ?',
        icon:'question',showCancelButton:true,
        confirmButtonText:'<i class="fa-solid fa-check"></i> Sí,eliminar',
        cancelButtonText:'<i class="fa-solid fa-ban"></i> Cancelar'
    }).then((result) =>{
        form.delete(route('misimagenes.destroy',id));
    });
}
</script>

<template>
    <Head title="Imágenes" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Imágenes</h2>
        </template>

        <div class="py-12">
            <div class="bg-white grid v-screen place-items-center">
                <div class="mt-3 mb-3 flex">
                    <Link :href="route('misimagenes.create')"
                    :class="'px-2 py-4 bg-gray-800 text-white border rounded-md font-semibold text-xs'">
                        <i class="fa-solid fa-plus-circle"></i> Agregar
                    </Link>
                </div>
            </div>
            <div class="bg-white grid v-screen place-items-center">
                <table class="table-auto border border-gray-400">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-4"> Id</th> 
                            <th class="px-4 py-4"> Título</th>
                            <th class="px-4 py-4"> Imagen</th>
                            <th class="px-4 py-4"> </th>
                            <th class="px-4 py-4"> </th>                         
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="imgn in images.data" :key="imgn.id">
                            <td class="border border-gray-400 px-4 py-4">{{ imgn.id }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ imgn.nombre }}</td>
                            <td class="border border-gray-400 px-4 py-4"><img class="h-12 rounded" :src="imgn.imagen" :alt="imgn.nombre"></td>
                            <td class="border border-gray-400 px-4 py-4">
                                <Link :href="route('misimagenes.edit',imgn.id)"
                                :class="'px-4 py-2 bg-blue-800 text-white border rounded-md font-semibold text-xs'">
                                    <i class="fa-solid fa-pen-to-square"></i> Editar
                                </Link>
                            </td>
                            <td class="border border-gray-400 px-4 py-4">
                                <DangerButton @click="$event => deleteImagen(imgn.id,imgn.nombre)">
                                    <i class="fa-solid fa-trash"></i>
                                </DangerButton>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
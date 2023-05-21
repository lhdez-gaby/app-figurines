<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,Link,useForm } from '@inertiajs/vue3';
import DangerButton from '@/Components/DangerButton.vue';
import Swal from 'sweetalert2';

defineProps({
    eventos:Object,
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
        form.delete(route('miseventosReservados.destroy',id));
    });
}
</script>

<template>
    <Head title="Eventos Reservados" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Eventos Reservados</h2>
        </template>

        <div class="py-12">
            <div class="bg-white grid v-screen place-items-center">
                <div class="mt-3 mb-3 flex">
                    <Link :href="route('miseventosReservados.create')"
                    :class="'px-2 py-4 bg-gray-800 text-white border rounded-md  text-xs'">
                        <i class="fa-solid fa-plus-circle"></i> Reservar evento
                    </Link>
                </div>
            </div>
            <div class="bg-white grid v-screen place-items-center">
                <table class="table-auto border border-gray-400">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-4"> Id</th> 
                            <th class="px-4 py-4"> Contratante</th>
                            <th class="px-4 py-4"> Evento</th>
                            <th class="px-4 py-4"> Fecha</th>
                            <th class="px-4 py-4"> Hora</th>
                            <th class="px-4 py-4"> Dirección</th>
                            <th class="px-4 py-4"> Teléfono</th>
                            <th class="px-4 py-4"> Estado</th>
                            <th class="px-4 py-4"> </th>                         
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="event in eventos.data" :key="event.id">
                            <td class="border border-gray-400 px-4 py-4">{{ event.id }}</td>
                            <td class="border border-gray-400 px-4 py-4 w-64">{{ event.user_id }}</td>
                            <td class="border border-gray-400 px-4 py-4 w-80">{{ event.detalle }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ event.precio }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ event.duracion }}</td>
                            <td class="border border-gray-400 px-4 py-4">
                                <Link :href="route('misimagenes.edit',event.id)"
                                :class="'px-4 py-2 bg-blue-800 text-white border rounded-md font-semibold text-xs'">
                                    <i class="fa-solid fa-plus-edit"></i>Editar
                                </Link>
                            </td>
                            <td class="border border-gray-400 px-4 py-4">
                                <DangerButton @click="$event => deleteImagen(event.id,event.nombre)">
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
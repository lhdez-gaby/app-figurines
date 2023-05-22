<template>
    <Head title="Imágenes" />

    <MainLayout>
        
  <div class="main" style="background: #07A5E7;">
    
    <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                                <Dropdown v-if="$page.props.auth.user" align="right" width="48">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button
                                                type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                            >
                                                {{ $page.props.auth.user.name }}

                                                <svg
                                                    class="ml-2 -mr-0.5 h-4 w-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <DropdownLink :href="route('profile.edit')"> Perfil </DropdownLink>
                                        <DropdownLink :href="route('logout')" method="post" as="button">
                                            Cerrar sesión
                                        </DropdownLink>
                                    </template>
                                </Dropdown> 

        <template v-else>
            <Link
                :href="route('login')"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                >Iniciar sesión</Link
            >

            <Link
                v-if="canRegister"
                :href="route('register')"
                class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                >Registrarse</Link
            >
        </template>
      </div>
    </div>
    <!-- ----Contenido principal---- -->
    <div class="mt-20">
      <h1 class="title font-extrabold text-lg" style="color: #07A5E7; margin-left: 100px; margin-top: 30px; ">¡Contrata ya el show que más te guste!</h1>
    </div>
      <div class="grid grid-cols-3 mx-20">
        <div
          class="flex items-center justify-start flex-col p-2"
          v-for = "event in eventos.data"
          :key="event.id"
        >
                     
            <div class="max-w-sm rounded overflow-hidden shadow-xl">
                <img class="w-full" :src="event.imagen" :alt="event.nombre">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">{{ event.nombre }}</div>
                        <p class="text-gray-700 text-base">
                             {{ event.detalle }}
                         </p>
                    </div>
                <div class="px-6 pt-4 pb-2">
                     <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">PRECIO:{{event.precio}}</span>
                     <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">DURACIÓN:{{event.duracion}}</span>  
                </div>
            </div>
        </div>
      </div>
    </MainLayout>
</template>


<script setup>
//Comun
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';

defineProps({
    eventos: Object,
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<style scoped>
  .main {
    background-color: #07A5E7;
  }
</style>
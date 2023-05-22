<template>
    <Head title="Imágenes" />

    <MainLayout>
        
  <div class="main">
    
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
    <main class="acerca mt-20" >
    <h1 class="py-8 text-2xl text-center" style="color: #07A5E7;">Acerca de los figurines.</h1>
    <section class="historia descripcion text-white flex items-center " >
      <img class="imagen pl-20" src="@/assets/historia.png" alt="Personajes de los shows">
      <div class="flex flex-col pl-12 pr-20">
        <h2 class="title font-extrabold pb-4">Un poco de historia</h2>
        <p>Después de organizar algunas fiestas infantiles exitosas, decidimos 
          reunir aun más talento y formar una empresa dedicada a brindar entretenimiento de calidad.
          Con el tiempo, la empresa creció y se convirtió en un referente en la industria de shows para 
          fiestas infantiles en Puebla.</p>
      </div>
    </section>
    <section class="mision flex items-center ">
      <img class="imagen pr-20" src="@/assets/mision.png" alt="Personajes de los shows">
      <div class="pr-12 pl-20">
        <h2 class="title font-extrabold pb-4">Misión</h2>
        <p>
          Brindar servicios de entretenimiento infantil de la más alta calidad, atractivos, dinámicos, y novedosos con personajes bien caracterizados innovando constantemente dentro del medio del espectáculo haciendo de cada show un evento único para lograr la satisfacción total de nuestros clientes.
        </p>
      </div>
    </section>
    <section class="vision descripcion flex text-white items-center">
      <img class="imagen pl-20" src="@/assets/vision.png" alt="Personajes de los shows">
      <div class="flex flex-col pl-12 pr-20">
        <h2 class="title font-extrabold pb-4">Visión</h2>
        <p>
          Consolidarnos dentro del medio de entretenimiento infantil como una empresa con altos
          estándares de calidad en constante crecimiento y transformáción, siendo referentes de
          servicio, profesionalismos y buen gusto que nos haga únicos en nuestro segmento.
        </p>
      </div>
    </section>
    <p class="mas text-center m-16">
      Si quieres saber más acerca de nosotros te invitamos a seguirnos en nuestras redes sociales
    </p>
  </main>
      
    </div>
    </MainLayout>
</template>


<script setup>
//Comun
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
// Local
import iconCake from '../Components/icons/IconCake.vue'
import iconParty from '../Components/icons/IconParty.vue'
import iconHappy from '../Components/icons/IconHappy.vue'
import iconBallon from '../Components/icons/iconBalloon.vue'

defineProps({
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
.descripcion{
  background: linear-gradient(to right,#07A5E7,#2C61AC);
  display:flex;
  flex-direction: row;
  justify-content: space-evenly;
  padding: 2rem;
}

.mision{
  display:flex;
  flex-direction: row-reverse;
  justify-content: space-evenly;
  padding: 1rem;
}



</style>
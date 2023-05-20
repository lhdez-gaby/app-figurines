<template>
    <Head title="Videos" />
    <MainLayout>
        
  <div class="main" style="background: #07A5E7;">
    
    <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
           
        <Dropdown v-if="$page.props.auth.user" width="48">
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


      <section class="banner">
        <div class="frase">
          <h1>ALEGRÍA , MAGIA Y DIVERSIÓN SOLO CON LOS FIGURINES SHOW</h1>
        </div> 
      </section>
      <section class="buscar">
        <h2 class="buscar-item">¡NO TE PIERDAS LA DIVERSIÓN!</h2>
        <RouterLink to="/servicios" class="buscar-item"><button class="btn">Buscar show</button></RouterLink>
      </section>

      <section class="opiniones" style="color: white; margin-left: 100px; margin-top: 30px;">
        <b>
          <h2 class="title">Shows de los figurines...</h2>
        </b>
      </section>
        
      <section class="contenedor" style="display: flex; justify-content: center;">
        <div class="row">
          <div class="col-12" style="padding-bottom: 50%; height: 0; margin-top: 50px; margin-bottom: 100px;">
            <div class="embed-responsive embed-responsive-1by1">
              <iframe class="embed-responsive-item w-full aspect-video"
                style="height: auto; width: 620px;" 
                src="https://youtube.com/embed/4HT0SJ3YY0Y" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
          
          <div class="col-12" style="padding-bottom: 50%; height: 0; margin-top: 50px; margin-bottom: 100px;">
            <div class="embed-responsive embed-responsive-1by1">
              <iframe class="embed-responsive-item w-full aspect-video"
                style="height: auto; width: 620px;" 
                src="https://youtube.com/embed/iEkDT0aajtk" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
          
          <div class="col-12" style="padding-bottom: 50%; height: 0; margin-top: 50px; margin-bottom: 100px;">
            <div class="embed-responsive embed-responsive-1by1">
              <iframe class="embed-responsive-item w-full aspect-video"
                style="height: auto; width: 620px;"
                src="https://youtube.com/embed/LwLkyt_CXGM" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>

        </div>
      </section>


      <section class="opiniones" style="color: white; margin-inline: 50px; text-align: center;">
        <b>
        <h2 class="opiniones__title">LO QUE NUESTROS CLIENTES OPINAN</h2>
        <div class="opinion">
          <div class="opinion_item">
             <iconHappy class="opinion__icon"/>
            <p class="opinion__texto">Suscribete a nuestro canal de youtube para que te enteres cuando subamos un video nuevo.</p>
          </div>
        </div>
        </b>
      </section>

      <!-- <RouterLink to="/contacto" class="contacto"><button class="btn">Contáctanos</button></RouterLink> -->
    </div>
    </MainLayout>

</template>

<style scoped>
  .opiniones {
    text-emphasis-color: #ffffff;
  }
</style>

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
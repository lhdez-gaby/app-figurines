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
                >Log in</Link
            >

            <Link
                v-if="canRegister"
                :href="route('register')"
                class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                >Register</Link
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
      <section class="caracteristicas">
        <div class="caracteristica">
          <iconParty class="caracteristica__icon"/>
          <h3 class="caracteristica__title">+300 personajes</h3>
          <p class="caracteristica__text">Tradicionales, de moda y de buena calidad.</p>
        </div>
        <div class="caracteristica">
          <iconCake class="caracteristica__icon"/>
          <h3 class="caracteristica__title">+18 años</h3>
          <p class="caracteristica__text">De experiencia nos respaldan</p>
        </div>
        <div class="caracteristica">
          <iconBallon class="caracteristica__icon"/>
          <h3 class="caracteristica__title">Entretenimiento garantizado</h3>
          <p class="caracteristica__text">Tenemos una excelente manera de mantener a los niños y grandes entretenidos</p>
        </div> 
      </section>
      <section class="descripcion">
        <img src="@/assets/shows.png" alt="diferentes shows">
        <div class="descripcion__textos">
          <h2 class="descripcion__texto">Haciendo eventos para ti</h2>
          <p class="descripcion__texto">Contratar un show es una excelente manera de animar a todos los invitados
         y hacer que el evento sea más memorable. Los shows pueden incluir música, 
          baile, comedia, magia  y otros actos, según sea el caso, que harán que todos
          sus invitados se diviertan y se sientan parte del evento.</p>
          <p class="descripcion__texto">
            Tenemos variedad de opciones, hay opciones para todos los gustos,
              lo que te permitirá elegir el tipo de show que mejor se adapte a tus necesidades 
              y preferencias.
          </p>
          <p class="descripcion__texto">
            Nuestros shows son realizados con profesionalismo y calidad, desde el vestuario y
            la producción hasta la interpretación. Estamos empeñados en brindar una 
            experiencia única e inolvidable para todos los invitados.
          </p>
        </div>
        
      </section>
      <section class="opiniones">
        <h2 class="opiniones__title">LO QUE NUESTROS CLIENTES OPINAN</h2>
        <div class="opinion">
          <div class="opinion_item">
             <iconHappy class="opinion__icon"/>
            <p class="opinion__texto">“Quedé muy contenta,todos los niños se divirtieron mucho, primero dios el otro año los volveré a contratar”</p>
          </div>
          <div class="opinion_item">
            <iconHappy class="opinion__icon"/>
            <p class="opinion__texto">“Estoy muy agradecida con los figurines que hicieron mi fiesta muy divertida con su  miniferia y el show de la casa de gaby, aparte de que el trato es de lo mejor”</p>
          </div>
        </div>
        
      </section>
      //<RouterLink to="/contacto" class="contacto"><button class="btn">Contáctanos</button></RouterLink>
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
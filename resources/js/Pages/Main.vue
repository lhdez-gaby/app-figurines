<template>
    <Head title="Inicio" />

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
      <section class="banner">
        <div class="frase">
          <h1>ALEGRÍA , MAGIA Y DIVERSIÓN SOLO CON LOS FIGURINES SHOW</h1>
        </div> 
      </section>
      <section class="buscar">
        <h2 class="buscar-item">¡NO TE PIERDAS LA DIVERSIÓN!</h2>
        <Link :href="route('eventos')" :class="'link p-4 rounded-full'">Buscar show</Link>
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
      <section class="opiniones my-4">
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
      <section class="opiniones">
        <Link :href="route('contacto')" :class="'link p-4 my-8 rounded-full'">Contáctanos</Link>
      </section>
      
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

.link{
  background: #EA4B9B;
  color:white;
}

.link:hover{
  color: #07A5E7;
}

.banner{
  margin-top: 4.8125rem;
  height: 85vh;
  background-image:url('@/assets/banner.png') ;
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  display: flex;
  align-items: flex-end;
}

.frase{
  background-color: rgba(7,165,231,0.70);
  width: 100%;
  text-align: center;
  color:white;
  font-weight: 800;
  padding: 20px;
}

.buscar{
  display: flex;
  flex-direction: column;
  align-items: center;
  background-color: #07A5E7;
  color: white;
  font-weight: 800;
  padding-top: 1.25rem;
  padding-bottom: 1.25rem;
}

.buscar-item{
  padding: 0.625rem;
}

.caracteristicas{
  padding-top:1.875rem;
  padding-bottom: 1.875rem;
  display: flex;
  flex-direction: row;
  justify-content: space-evenly;
  text-align: center;
}

.caracteristica{
  display:flex;
  flex-direction: column;
  align-items: center;
  gap: 0.625rem;
  max-width: 15rem;
}

.caracteristica__icon{
  height: 3rem;
  width: 3rem;
  background-color: #07A5E7;
  border-radius: 50%;
  padding: 0.375rem;
  color: white;
}
.caracteristica__title{
  font-weight: 800;
  text-align: center;
}

.caracteristica__text{
  text-align: center;
}

.descripcion{
  background: linear-gradient(to right,#07A5E7,#2C61AC);
  display:flex;
  flex-direction: row;
  justify-content: space-evenly;
  padding: 1rem;
}

.descripcion__textos{
  max-width: 39.0625rem;
  color: white;
}

.descripcion__texto{
  margin:1rem;
}

.descripcion__textos:first{
  font-weight: 800;
}

.opiniones{
  display: flex;
  flex-direction: column;
  align-items: center;
}

.opiniones__title{
 font-weight: 800;
 text-align: center;
 padding: 2.5rem;
}

.opinion{
  display: flex;
  flex-direction: row;
  justify-content: space-evenly;
  width: 90%;
}

.opinion_item{
  box-shadow: 0.2rem 0.2rem 0.2rem 0.2rem rgba(0,0,0,0.25);
  display: flex;
  flex-direction: column;
  align-items: center;
  max-width: 15rem;
  gap: 1.5rem;
}

.opinion__icon{
  width: 3rem;
  height: 3rem;
  padding-top: .5rem;
}

.opinion__texto{
  text-align: center;
  font-style: italic;
  padding: 1rem;
}

.contacto{
  display: flex;
  padding: 2rem;
  align-items: center;
  justify-content: center;
}
</style>
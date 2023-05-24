<template>
    <Head title="Contacto" />
    <MainLayout>
        
  <div class="main">
    
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
<div class="container mt-20 mx-20">
  <div class="my-grid">
    <div>
      <h1 class="color-blue font-extrabold text-2xl">Contacto</h1>
      <ul>
        <li class="flex my-8">
          <i class="fa-solid fa-house-chimney icono mr-4 min-w-[8%]"></i> 
          <div>
            <h3>
              DIRECCIÓN
            </h3>
            <p class="text-gray-700 max-w-[60%]">
            Av. San Ignacio 1819 col. San Manuel. Frente a la iglesia María Reyna 72570 Puebla de Zaragoza, México
            </p>
          </div>
        </li>
        <li class="flex mb-8">
          <i class="fa-solid fa-phone-volume icono mr-4"></i>
          <div>
            <h3>
              TELÉFONO
            </h3>
            <p class="text-gray-700">
              222 328 6686
            </p>
          </div>
        </li>
        <li class="flex">
          <i class="fa-solid fa-at icono mr-4"></i>
          <div>
            <h3>
              EMAIL
            </h3>
            <p class="text-gray-700">
              222 328 6686
            </p>
          </div>
        </li>
      </ul>
    </div>
    <div>
      <h2 class="font-extrabold color-blue text-2xl">Ubicación</h2>
      <iframe class="max-h-[80%] mt-8" src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3772.2753264035696!2d-98.20125082645295!3d19.00758568218293!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sAv.%20San%20Ignacio%201819%20col.%20San%20Manuel%20%2072570%20Puebla%20de%20Zaragoza%2C%20M%C3%A9xico!5e0!3m2!1ses!2smx!4v1684888887046!5m2!1ses!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>

  <div class="flex gap-20 items-center">
    <div>
      <img src="@/assets/contacto.png" alt="Contacto" />
    </div>
    <div class="min-w-[30%]" >
      <h2 class="font-extrabold color-blue mb-8 text-2xl">Escríbenos</h2>
      <form @submit.prevent="submit" action="">
        <div class="flex gap-2 flex-col" >
          <div class="flex flex-col">
            <label class="text-gray-700 mb-2" for="nombre">Nombre</label>
            <input
              id="nombre"
              class="border-gray-400 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full" 
              type="text"
              v-model="form.name"
              >
            <span class="text-sm m-2  text-red-400" v-if="form.errors.name">{{ form.errors.name }}</span>
          </div>
          <div class="flex flex-col">
            <label class="text-gray-700 mb-2" for="email">Email</label>
            <input
              id="email"
              class="border-gray-400 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" 
              type="text"
              v-model="form.email"
              >
              <span class="text-sm m-2  text-red-400" v-if="form.errors.email">{{ form.errors.email }}</span>
          </div>

          <div class="flex flex-col">
            <label class="text-gray-700 mb-2" for="mensaje">Mensaje</label>
            <textarea
              id="mensaje"
              class="border-gray-400 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" 
              spellcheck="false"
              v-model="form.body"
              >
              </textarea>
              <span class="text-sm m-2  text-red-400" v-if="form.errors.body">{{ form.errors.body }}</span>
          </div>
          <button class="boton">
            Enviar mensaje
          </button>
        </div>
        
      </form>
    </div>
  </div>
  
</div>
    </div>
    </MainLayout>

</template>

<script setup>
//Comun
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import { ref } from 'vue';


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

const form = useForm({
  name:"",
  email:"",
  body:""
});

const submit = () =>{
  form.post(route('contact'))
}



</script>

<style scoped>
.color-blue{
  color:#07A5E7;
}

.my-grid{
  display:flex;
  flex-direction: row-reverse;
  gap: 5rem;
}

.icono{
  display:flex;
  align-items: center;
  justify-content: center;
  height: 3rem;
  width: 3rem;
  background-color: #07A5E7;
  border-radius: 50%;
  padding: 0.375rem;
  color: white;
}

.boton{
  background-color: #07A5E7;
  border-radius: 2rem;
  padding: 1rem;
  color: white;
  margin-bottom: 2rem;
}

</style>
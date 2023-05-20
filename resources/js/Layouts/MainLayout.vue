<template>
    <header class="header">
      <div class="wrapper">
        <!-- <img alt="Logo los figurines" class="logo" src="@/assets/logoFigurines.png" /> -->
        <Link :href="route('main')">
            <img alt="Logo los figurines" class="logo" src="@/assets/logoFigurines.png" />
        </Link>
        <nav class = "menu">
            <Link :class="'link'" :href="route('acerca')">
                Acerca de
            </Link>
            <Link :class="'link'" :href="route('imagenes')">
                Imágenes
            </Link>
            <Link :class="'link'" :href="route('videos')">
                Videos
            </Link>
          <!-- <RouterLink to="/servicios" class="link">Servicios</RouterLink>
          <RouterLink to="/acerca" class="link">Acerca</RouterLink>
          <RouterLink to="/imagenes" class="link">Imágenes</RouterLink>
          <RouterLink to="/videos" class="link">Vídeos</RouterLink>
          <RouterLink to="/testimonios" class="link">Testimonios</RouterLink>
          <RouterLink to="/ubicacion" class="link">Ubicación</RouterLink>
          <RouterLink to="/contacto" class="link">Contacto</RouterLink> -->
        </nav>
        <!-- <div class="acciones">
          <RouterLink to="/login" > <button class="btn">Iniciar sesión</button>  </RouterLink>
          <RouterLink to="/registro" class="link">Registrate</RouterLink>
        </div> -->
      </div>
      <div
    class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"
>
  </div>
    </header>
    <main>
        <slot />
    </main>
    <UserFooter />
    
</template>


<script setup>
import UserFooter from '@/Layouts/UserFooter.vue';
import { ref } from 'vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';

//Local

</script>

<style scoped>
.header{
  background-color: white;
  width: 100vw;
  height: 4.8125rem;
  position: fixed;
  top: 0;
  display: flex;
  justify-content: center;
}
.wrapper{
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: space-evenly;
  padding: 0.625rem;
  gap: 3rem;
}

.menu{
  display: flex;
  flex-direction: row;
  gap: 1rem;
}

nav a.router-link-exact-active {
  color: var(--color-text-link-active);
}

.link{
  color:#EA4B9B;
}

.link:hover{
  color: #07A5E7;
}

</style>

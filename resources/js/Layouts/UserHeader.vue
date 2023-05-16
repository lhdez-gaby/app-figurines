<template>
    <header class="header">
      <div class="wrapper">
        <RouterLink to="/"><img alt="Logo los figurines" class="logo" src="@/assets/logoFigurines.png" /></RouterLink>
        <nav class = "menu">
          <RouterLink to="/servicios" class="link">Servicios</RouterLink>
          <RouterLink to="/acerca" class="link">Acerca</RouterLink>
          <RouterLink to="/imagenes" class="link">Imágenes</RouterLink>
          <RouterLink to="/videos" class="link">Vídeos</RouterLink>
          <RouterLink to="/testimonios" class="link">Testimonios</RouterLink>
          <RouterLink to="/ubicacion" class="link">Ubicación</RouterLink>
          <RouterLink to="/contacto" class="link">Contacto</RouterLink>
        </nav>
        <div class="acciones">
          <RouterLink to="/login" > <button class="btn">Iniciar sesión</button>  </RouterLink>
          <RouterLink to="/registro" class="link">Registrate</RouterLink>
        </div>
      </div>
    </header>
  
    <RouterView />
</template>

<script setup>
import { RouterLink, RouterView } from 'vue-router'

</script>

<style scoped>
.header{
  background-color: var(--vt-c-white);
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
}

.menu{
  display: flex;
  flex-direction: row;
  gap: 7px;
}

nav a.router-link-exact-active {
  color: var(--color-text-link-active);
}

.link{
  color:var(--vt-c-pink);
}

.link:hover{
  color: var(--color-text-link-active);
}

.acciones{
  display: flex;
  flex-direction: row;
  gap: 0.3125rem;
  align-items: center;
}
</style>
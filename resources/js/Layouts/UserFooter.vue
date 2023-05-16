<template>
    <footer class="footer">
        <div class="social item">
           <h3 class="title">Redes Sociales</h3> 
           <div class="icons">
            <iconFacebook />
            <IconInstagram />
            <iconYouTube />
           </div>
           
        </div>
        <div class="telefono item">
            <h3 class="title">Llámanos</h3>
            <p>222 328 6686</p>
        </div>
        <div class="direccion item">
            <h3 class="title">Dirección</h3>
            <p class="texto">Av. San Ignacio 1819 
                col. San Manuel 
                Frente a la iglesia 
                María Reyna 72570 
                Puebla de Zaragoza, México</p>
        </div>

    </footer>
</template>

<script setup>
import iconFacebook from '../icons/iconFacebook.vue';
import iconYouTube from '../icons/iconYouTube.vue';
import IconInstagram from '../icons/IconInstagram.vue';
</script>

<style scoped>
    .footer{
        background: linear-gradient(to right,#07A5E7,#2C61AC);
        color: white;
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
    }
    .item{
        margin-top: 1.5rem;
        margin-bottom: 1.5rem;
    }
    .title{
        font-weight: 800;
    }
    .texto{
        max-width: 15rem;
    }
</style>
<template>
<main>
    <!--<the-header></the-header>-->
    <three-rule-brand></three-rule-brand>
    <!--<download-logo></download-logo>-->
    <register-login-logo></register-login-logo>
    <!--<section class="top">-->
    <!--    <router-link to="/selectclub/3">Clubページへ</router-link>-->
    <!--</section>-->
    
    <div class="main-image">
        <!--<img src="img/music_ochiai2.jpg" alt="ミュージック"><img src="img/sports_fencing.png" alt="スポーツ"><img src="img/art3.jpeg" alt="アート">-->
        <img src="https://d1f5hsy4d47upe.cloudfront.net/b1/b1a383d0ecbbee36d48621204f4bd1ae_t.jpeg">
        <div class="main-text">
            <p class="main-first">HAVE A FUN</p>
            <p class="main-second">EVERYTHING IS GAME</p>
        </div>
    </div>
    
    
    <!--<the-footer></the-footer>-->
</main>
</template>


<script>
import TheHeader from '../../components/TheHeader';
import ThreeRuleBrand from '../../components/top/ThreeRuleBrand';
// import DownloadLogo from '../../components/top/DownloadLogo';
import RegisterLoginLogo from '../../components/top/RegisterLoginLogo';
import TheFooter from '../../components/TheFooter';
export default {
    components: {
        TheHeader,
        ThreeRuleBrand,
        // DownloadLogo,
        RegisterLoginLogo,
        TheFooter
    },
    data () {
        return {
        }
    }
};
</script>

<style scoped>

img {
    max-width: 100%;
    height: auto;
}

.main-iamge {
    position: relative;
    display: flex;
}
.main-image img {
    width:  100%;
    height: 330px;
    margin-left: 0;
}
.main-text {
    line-height: 1.75;
    letter-spacing: 0.1em;
    font-size: 40px;
    font-weight: bold;
    text-align: center;
    color: white;
    position: absolute;
    top: 20%;
    left: 50%;
    transform: translate(-50%,-50%);
}


</style>
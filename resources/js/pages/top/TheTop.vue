<template>
<main>
    <!--<the-header></the-header>-->
    <three-rule-brand></three-rule-brand>
    <register-login-logo></register-login-logo>
    <the-footer></the-footer>
</main>
</template>


<script>
import TheHeader from '../../components/TheHeader.vue';
import ThreeRuleBrand from '../../components/top/ThreeRuleBrand.vue';
import RegisterLoginLogo from '../../components/top/RegisterLoginLogo.vue';
import TheFooter from '../../components/TheFooter.vue';

export default {
    components: {
        TheHeader,
        ThreeRuleBrand,
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
</style>
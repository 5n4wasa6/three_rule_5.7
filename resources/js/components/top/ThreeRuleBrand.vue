<template>
    <div class="brand-container">
        <div class="brand">
            <router-link to="/">3rule</router-link>
        </div>
    </div>
</template>
<script>
export default {
}
</script>

<style scoped>
.brand-container {
    position: relative;
}
.brand {
    position: fixed;
    background-color: rgba(5, 40, 247, 95);
    border: none;
    font-weight: bold;
    width: 110px;
    height: 40px;
    top: 16px;
    left: 16px;
    text-align: center;
}
.brand a {
    color: white;
    font-size: 24px;
    font-weight: bold;
}
</style>
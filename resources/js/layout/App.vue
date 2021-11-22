<template>
    <div>
        <Navbar/>
        <b-container>
            <div>
                <slot></slot>
            </div>
        </b-container>
    </div>
</template>

<script>
import Navbar from './components/Navbar';

export default {
    name: 'App',
    components: {
        Navbar,
    },
};
</script>

<style scoped>

</style>

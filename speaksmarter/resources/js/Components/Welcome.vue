<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
</script>

<template>
    <div>
        <h1>Hello world</h1>

        <button v-if="$page.props.user.permissions.includes('create roles')">
            Manage Roles
        </button>
        <br />

        <button v-if="$page.props.user.permissions.includes('create lessons')">
            Manage Lessons
        </button>
        <br />
        {{ $page.props }}
    </div>
</template>

<style>
button {
    background-color: red;
    margin: 10px;
    padding: 10px;
}
</style>

<script setup>
const props = defineProps({
    data: {
        type: Array,
        required: true,
    },
});
</script>

<template>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Date/Time</th>
            <th scope="col">Value</th>
            <th scope="col">Description</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="item in props.data">
            <th>{{ item.datetime }}</th>
            <th>{{ item.value }}</th>
            <th>{{ item.description }}</th>
        </tr>
        </tbody>
    </table>
</template>

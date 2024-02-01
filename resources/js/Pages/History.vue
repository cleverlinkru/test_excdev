<script setup>
import {router} from '@inertiajs/vue3';
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import OperationsList from "../Components/Wallet/OperationsList.vue";
import {reactive} from "vue";

const props = defineProps({
    operations: {
        type: Object,
        required: true,
    },
});

const form = reactive({
    search: '',
});

const handleSearch = () => {
    router.visit(route('history', {search: form.search}));
};
</script>

<template>
    <DefaultLayout>
        <div class="mb-3">
            <input
                v-model="form.search"
                type="text"
                class="form-control"
                id="search"
                placeholder="Search"
                @keydown.enter="handleSearch"
            />
        </div>
        <OperationsList :data="props.operations.data"/>
    </DefaultLayout>
</template>

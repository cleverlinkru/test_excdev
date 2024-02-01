<script setup>
import {router} from '@inertiajs/vue3';
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import OperationsList from "../Components/Wallet/OperationsList.vue";

const props = defineProps({
    operations: {
        type: Object,
        required: true,
    },
    refresh_interval: {
        type: Number,
        required: true,
    },
});

setInterval(() => {
    router.reload({only: ['operations', 'auth']});
}, props.refresh_interval * 1000);
</script>

<template>
    <DefaultLayout>
        <p v-if="$page.props.auth.user">Balance: {{ $page.props.auth.user.wallet_balance.value }}</p>
        <OperationsList :data="props.operations.data"/>
    </DefaultLayout>
</template>

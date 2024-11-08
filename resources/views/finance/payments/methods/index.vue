<script setup lang="ts">
useHead({
    title: "Payment Methods",
});

const props = defineProps<{
    methods: App.Data.Finance.PaymentMethodData[];
    networks: App.Data.Finance.NetworkData[];
}>();

// console.log(props.networks);
</script>

<template>
    <SharedCommonOverlay title="Manage Payment Methods" size="xl">
        <div class="mt-5">
            <FinancePaymentsMethodsList :methods="methods" />
            <FinancePaymentsMethodsForm :networks="networks" />
        </div>
    </SharedCommonOverlay>
</template>

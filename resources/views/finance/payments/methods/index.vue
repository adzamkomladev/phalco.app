<script setup lang="ts">
useHead({
    title: "Payment Methods",
});
</script>

<template>
    <SharedCommonOverlay title="Manage Payment Methods" size="xl">
        <div class="mt-5">
            <FinancePaymentsMethodsList :methods="[]" />
            <FinancePaymentsMethodsForm />
        </div>
    </SharedCommonOverlay>
</template>

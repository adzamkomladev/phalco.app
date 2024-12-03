<script setup lang="ts">
import AccountImage from "~/resources/images/finance/accounts.webp?src";

useHead({
    title: "Payment Methods",
});

const props = defineProps<{
    methods: App.Data.Finance.PaymentMethodData[];
    networks: App.Data.Finance.NetworkData[];
}>();
</script>

<template>
    <SharedCommonOverlay
        title="Manage Payment Methods"
        class="max-w-xl w-xl _sm:max-w-full"
    >
        <div
            class="flex rounded-3xl bg-secondary-300 dark:bg-gradient-to-r from-secondary-950 to-secondary-800"
        >
            <div class="font-medium pt-10 px-10 basis-1/2 shrink-0 grow">
                <p class="text-gray-50 text-lg dark:text-gray-100">
                    Withdrawal Account
                </p>
                <p class="font-normal text-xs dark:text-gray-300 text-gray-100">
                    Select or create a new account for withdrawal purposes
                </p>
            </div>
            <div class="">
                <img
                    :src="AccountImage"
                    class="w-full _sm:hidden h-52 w-auto"
                />
            </div>
        </div>

        <div class="mt-5 pb-20">
            <FinancePaymentsMethodsList :methods="methods" />
            <p class="text-secondary-300 text-sm pb-5">Add Account</p>
            <FinancePaymentsMethodsForm :networks="networks" />
        </div>
    </SharedCommonOverlay>
</template>

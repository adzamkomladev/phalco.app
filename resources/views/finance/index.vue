<script setup lang="ts">
useHead({
    title: "Finance",
});

const props = defineProps<{
    transactions: Table<{
        id: number;
    }>;
    payments: Table<{
        id: number;
    }>;
    stats: any;
    wallets: any;
}>();
</script>

<template layout="main">
    <!-- Card Section -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
            <!-- Card -->
            <div
                v-for="(wallet, index) in wallets"
                :key="index"
                class="flex flex-col gap-y-3 lg:gap-y-5 p-4 md:p-5 bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800"
            >
                <div class="inline-flex justify-center items-center">
                    <span
                        class="size-2 inline-block bg-gray-500 rounded-full me-2"
                    ></span>
                    <span
                        class="text-xs font-semibold uppercase text-gray-600 dark:text-neutral-400"
                        >{{ index }}</span
                    >
                </div>

                <div class="text-center">
                    <h3
                        class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-800 dark:text-neutral-200"
                    >
                        {{ wallet.balance }}
                    </h3>
                </div>

                <dl
                    class="flex justify-center items-center divide-x divide-gray-200 dark:divide-neutral-800"
                >
                    <dt class="pe-3">
                        <router-link
                            :href="
                                route('finance.payments.withdraw', {
                                    walletId: wallet.id,
                                })
                            "
                            class="block text-sm text-gray-500 dark:text-neutral-500"
                        >
                            Withdraw
                        </router-link>
                        <router-link
                            :href="
                                route('finance.payments.top-up', {
                                    walletId: wallet.id,
                                })
                            "
                            class="block text-sm text-gray-500 dark:text-neutral-500"
                        >
                            Top Up
                        </router-link>
                    </dt>
                    <dd class="text-start ps-3">
                        <span
                            class="text-sm font-semibold text-gray-800 dark:text-neutral-200"
                            >GHS</span
                        >
                        <span
                            class="block text-sm text-gray-500 dark:text-neutral-500"
                            >currency</span
                        >
                    </dd>
                </dl>
            </div>
        </div>
        <!-- End Grid -->
    </div>
    <!-- End Card Section -->
    <pre>{{ stats }}</pre>
    <pre>{{ payments }}</pre>
    <pre>{{ transactions }}</pre>
</template>

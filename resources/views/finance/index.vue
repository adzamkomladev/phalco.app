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
    <div
        class="max-w-[85rem] px-4 text-gray-800 dark:text-gray-300 sm:px-6 lg:px-8 mx-auto"
    >
        <!-- Grid -->
        <div class="pb-5">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">
                Finance
            </h2>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Impedit, optio.
            </p>
        </div>

        <div class="w-60">
            <sharedFormBaseAdvanceSelect
                hideOnSelect
                :options="['456785421234', '12356789111111', '134567893456111']"
                optionClass="py-1 text-sm w-60"
                position="bottom-center"
                selectClass=" min-w-40 w-60 max-w-60 "
                optionsClass="min-w-40 "
            />
        </div>
        <div class="flex gap-4 sm:gap-6 self-center w-full bg-red-500">
            <FinanceIndexWalletCard />
            <div></div>
        </div>
    </div>

    <!-- <ElectionsIndexTable  /> -->
</template>

<script setup lang="ts">
const table = ref("payments");

const props = defineProps({
    transactions: Array,
    payments: Array,
    stats: Object,
    wallets: Array,
});

function toggleTable(newTable: string) {
    table.value = newTable;
}
</script>

<template layout="main">
    <div
        class="max-w-[85rem] px-4 text-gray-800 dark:text-gray-300 sm:px-6 lg:px-8 mx-auto"
    >
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">
            Finance
        </h2>
        <p class="text-sm text-gray-600 dark:text-gray-400">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit,
            optio.
        </p>

        <div class="flex py-5 justify-between">
            <div class="w-60">
                <sharedFormBaseAdvanceSelect
                    hideOnSelect
                    :options="[
                        '456785421234',
                        '12356789111111',
                        '134567893456111',
                    ]"
                    optionClass="py-1 text-sm w-60"
                    position="bottom-center"
                    selectClass="min-w-40 w-60 max-w-60"
                    optionsClass="min-w-40"
                    placeholder="select wallet"
                />
            </div>

            <router-link
                :href="route('finance.payments.methods.index')"
                class="px-4 h-fit py-2 text-sm flex items-center text-nowrap rounded-lg bg-secondary-300 text-white"
                >Withdrawal Accounts</router-link
            >
        </div>

        <div class="flex _md:flex-col py-5 gap-4 sm:gap-6 self-center">
            <FinanceIndexWalletCard :wallet_id="3" />

            <div class="grid gap-4 sm:gap-6 grid-cols-2 _xs:grid-cols-1 grow">
                <FinanceIndexWalletDetailsCard />
                <FinanceIndexWalletDetailsCard />
                <FinanceIndexWalletDetailsCard />
                <FinanceIndexWalletDetailsCard />
            </div>
        </div>

        <div class="flex gap-10 w-fit text-lg relative mb-10">
            <button @click="toggleTable('payments')" class="py-2 rounded">
                Payment
            </button>
            <button @click="toggleTable('transactions')" class="py-2 e rounded">
                Transaction
            </button>
            <div
                class="bg-primary-500 h-[3px] transition-all duration-500 absolute w-[calc(50%)] bottom-0"
                :class="[table === 'transactions' ? 'right-0' : 'right-1/2']"
            />
        </div>

        <div class="transition-container">
            <!-- Payment Table Transition -->
            <transition name="payment" mode="out-in">
                <div
                    :key="table"
                    class="transition-all duration-500 overflow-hidden"
                >
                    <div v-if="table === 'payments'">
                        <FinanceIndexPaymentsTable />
                    </div>
                </div>
            </transition>

            <!-- Transaction Table Transition -->
            <transition name="transaction" mode="out-in">
                <div
                    :key="table"
                    class="transition-all duration-500 overflow-hidden"
                >
                    <div>
                        <FinanceIndexTransactionsTable
                            v-if="table === 'transactions'"
                        />
                    </div>
                </div>
            </transition>
        </div>
    </div>
</template>

<style scoped>
.payment-enter-active,
.payment-leave-active,
.transaction-enter-active,
.transaction-leave-active {
    transition: all 0.3s ease;
}
.payment-enter,
.payment-leave-to {
    transform: translateX(10rem), scale(0.8);
    opacity: 0;
}

.transaction-enter,
.transaction-leave-to {
    transform: translateX(-10rem), scale(0.8);
    opacity: 0;
}

.transition-container {
    position: relative;
}
</style>

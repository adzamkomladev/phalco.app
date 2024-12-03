<script setup lang="ts">
const table = ref("payments");

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

const paymentsTable = useTable(props, "payments");
const transactionsTable = useTable(props, "transactions");

const options = Object.entries(props.wallets).map(([key, value]: any[]) => {
    return { label: key, value: value.id };
});
const selectedWalletId = ref(props.wallets.main?.id);
const selectedWallet = ref({
    name: "main",
    id: props.wallets.main?.id,
    balance: props.wallets.main?.balance,
});

const updateSelectedWallet = (id: number) => {
    selectedWalletId.value = id;

    const foundWallet = Object.entries(props.wallets).find(
        ([_, value]: any[]) => value.id === id,
    );

    if (foundWallet) {
        const [key, value]: any[] = foundWallet;

        selectedWallet.value = {
            name: key,
            id: value.id,
            balance: +value.balance,
        };
    } else {
        selectedWallet.value = {
            name: "main",
            id: props.wallets.main?.id,
            balance: +props.wallets.main?.balance,
        };
    }
};

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
                <SharedFormBaseAdvanceSelect
                    :modelValue="selectedWalletId"
                    @update:modelValue="updateSelectedWallet"
                    hideOnSelect
                    :options="options"
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
            <FinanceIndexWalletCard
                :name="selectedWallet.name"
                :balance="selectedWallet.balance"
                :id="selectedWalletId"
            />

            <div class="grid gap-4 sm:gap-6 grid-cols-2 _xs:grid-cols-1 grow">
                <FinanceIndexWalletDetailsCard
                    name="Total Balance"
                    :value="'GHS ' + stats.balance"
                />
                <FinanceIndexWalletDetailsCard
                    name="Total Transactions"
                    :value="stats.transactions"
                />
                <FinanceIndexWalletDetailsCard
                    name="Total Deposits"
                    :value="'GHS ' + stats.deposits"
                />
                <FinanceIndexWalletDetailsCard
                    name="Total Withdrawals"
                    :value="'GHS ' + stats.withdrawals"
                />
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
                        <FinanceIndexPaymentsTable :table="paymentsTable" />
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
                            :table="transactionsTable"
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

<script setup lang="ts">
onMounted(() => {
    window.HSStaticMethods.autoInit();
});

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
        class="max-w-[85rem] mobile:px-4 text-gray-800 dark:text-gray-300 sm:px-6 lg:px-8 mx-auto"
    >
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">
            Finances
        </h2>
        <p class="text-sm text-gray-600 dark:text-gray-400">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit,
            opti
        </p>

        <div class="flex py-5 justify-between _xs:flex-col gap-4 _xs:w-60">
            <div class="w-60">
                <SharedFormBaseAdvanceSelect
                    :modelValue="selectedWalletId"
                    @update:modelValue="updateSelectedWallet"
                    hideOnSelect
                    :placeholder="'select wallet ...'"
                    :options="options"
                    optionClass="py-1 text-sm w-60"
                    position="bottom-center"
                    selectClass="min-w-40 w-60 max-w-60"
                    optionsClass="min-w-40"
                />
            </div>

            <router-link
                :href="route('finance.payments.methods.index')"
                class="px-4 h-fit py-2 text-sm flex items-center max-w-full _mobile:w-text-xs text-nowrap rounded-lg bg-secondary-300 text-white"
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
        <div class="w-full overflow-hidden">
            <div class="mx-10 py-4">
                <nav
                    class="flex gap-x-4"
                    aria-label="Tabs"
                    role="tablist"
                    aria-orientation="horizontal"
                >
                    <button
                        type="button"
                        class="hs-tab-active:font-semibold hs-tab-active:pointer-events-none flex flex-col hs-tab-active:text-primary-500 gap-2 px-1 inline-flex items- gap-x-2 whitespace-nowrap text-gray-500 hover:text-primary-600 focus:outline-none focus:text-primary-600 transitionss-all disabled:opacity-50 disabled:pointer-events-none active"
                        id="basic-tabs-payments"
                        aria-selected="true"
                        data-hs-tab="#tabs-payments"
                        aria-controls="tabs-payments"
                        role="tab"
                    >
                        Payments
                        <p
                            class="w-0 hs-tab-active:w-full transition-all duration-500 border-b-[3px] -mb-[1px] hs-tab-active:border-primary-400 block"
                        ></p>
                    </button>
                    <button
                        type="button"
                        class="hs-tab-active:font-semibold hs-tab-active:pointer-events-none flex flex-col hs-tab-active:text-primary-500 gap-2 px-1 inline-flex items-end gap-x-2 whitespace-nowrap text-gray-500 hover:text-primary-600 focus:outline-none focus:text-primary-600 transitionss-all disabled:opacity-50 disabled:pointer-events-none"
                        id="basic-tabs-item-2"
                        aria-selected="false"
                        data-hs-tab="#tabs-transactions"
                        aria-controls="tabs-transactions"
                        role="tab"
                    >
                        Transactions
                        <p
                            class="w-0 hs-tab-active:w-full place-self-right transition-all duration-500 border-b-[3px] -mb-[1px] hs-tab-active:border-primary-400 block"
                        ></p>
                    </button>
                </nav>
            </div>

            <div class="mt-3">
                <div
                    :duration="300"
                    v-motion-slide-visible-left
                    id="tabs-payments"
                    role="tabpanel"
                    aria-labelledby="payments"
                >
                    <FinanceIndexPaymentsTable :table="paymentsTable" />
                </div>

                <div
                    :duration="300"
                    v-motion-slide-visible-right
                    id="tabs-transactions"
                    class="hidden"
                    role="tabpanel"
                    aria-labelledby="transactions"
                >
                    <FinanceIndexTransactionsTable :table="transactionsTable" />
                </div>
            </div>
        </div>
    </div>
</template>

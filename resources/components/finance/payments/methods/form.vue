<script setup lang="ts">
const props = defineProps<{
    networks: App.Data.Finance.NetworkData[];
}>();

console.log(props.networks);

const form = useForm({
    method: "POST",
    url: route("finance.payments.methods.store"),
    fields: {
        account_name: "",
        account_number: "",
        channel_code: "",
        network_code: "",
    },
    hooks: {
        success: () => form.reset(),
    },
});

const channels = [
    { label: "Mobile Money", value: "mobile_money" },
    // { label: "Bank", value: "bank" },
];

const bankNetworks = [
    { label: "Access Bank", value: "access" },
    { label: "GT Bank", value: "gtbank" },
];

const mobileMoneyNetworks = props.networks?.map(
    (network: App.Data.Finance.NetworkData) => ({
        label: network.name,
        value: network.code,
    }),
);
</script>
<template>
    <form @submit.prevent="form.submit">
        <h4 class="h4 mb-5 font-bold">New Payment Method</h4>
        <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">
            <div class="sm:col-span-3">
                <label
                    for="account_name"
                    class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200"
                >
                   Account Name
                </label>
            </div>

            <div class="sm:col-span-9">
                <SharedFormBaseInput
                    v-model="form.fields.account_name"
                    :error="form.errors.account_name"
                    id="account_name"
                    name="account_name"
                    placeholder="Full Name on Payment Method"
                />
            </div>
            <div class="sm:col-span-3">
                <label
                    for="account_number"
                    class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200"
                >
                    Account Number
                </label>
            </div>

            <div class="sm:col-span-9">
                <SharedFormBaseInput
                    v-model="form.fields.account_number"
                    :error="form.errors.account_number"
                    id="account_number"
                    name="account_number"
                    placeholder="Account Number"
                />
            </div>

            <div class="sm:col-span-3">
                <label
                    for="type"
                    class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200"
                >
                    Channel
                </label>
            </div>
            <div class="sm:col-span-9">
                <SharedFormBaseSelect
                    v-model="form.fields.channel_code"
                    :error="form.errors.channel_code"
                    id="channel_code"
                    name="channel_code"
                    :options="channels"
                    placeholder="Payment Method Channel..."
                />
            </div>

            <div class="sm:col-span-3">
                <label
                    for="network_code"
                    class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200"
                >
                    Network
                </label>
            </div>
            <div class="sm:col-span-9">
                <SharedFormBaseSelect
                    v-model="form.fields.network_code"
                    :error="form.errors.network_code"
                    id="network_code"
                    name="network_code"
                    :options="
                        form.fields.channel_code === 'bank'
                            ? bankNetworks
                            : mobileMoneyNetworks
                    "
                    placeholder="Payment Method Network..."
                />
            </div>
        </div>

        <div class="mt-8 flex justify-end gap-x-2">
            <button
                type="submit"
                class="w-3/12 py-2 px-3 items-center gap-x-2 text-sm text-center font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
            >
                <span
                    v-if="form.processing"
                    class="animate-spin inline-block size-4 border-[3px] border-current border-t-transparent text-white rounded-full"
                    role="status"
                    aria-label="loading"
                ></span>

                Create
            </button>
        </div>
    </form>
</template>

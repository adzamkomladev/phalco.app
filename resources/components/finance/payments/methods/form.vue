<script setup lang="ts">
const form = useForm({
    method: "POST",
    url: route("finance.payments.methods.store"),
    fields: {
        name: "",
        account_number: "",
        type: "",
        network: "",
    },
    hooks: {
        success: () => form.reset(),
    },
});

const types = [
    { label: "Mobile Money", value: "mobile_money" },
    { label: "Bank", value: "bank" },
];

const bankNetworks = [
    { label: "Access Bank", value: "access" },
    { label: "GT Bank", value: "gtbank" },
];

const mobileMoneyNetworks = [
    { label: "MTN", value: "mtn" },
    { label: "AirtelTigo", value: "airteltigo" },
    { label: "Telecel", value: "telecel" },
];
</script>
<template>
    <form @submit.prevent="form.submit">
        <h4 class="h4 mb-5 font-bold">New Payment Method</h4>
        <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">
            <div class="sm:col-span-3">
                <label
                    for="name"
                    class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200"
                >
                    Name
                </label>
            </div>

            <div class="sm:col-span-9">
                <SharedFormBaseInput
                    v-model="form.fields.name"
                    :error="form.errors.name"
                    id="name"
                    name="name"
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
                    Type
                </label>
            </div>
            <div class="sm:col-span-9">
                <SharedFormBaseSelect
                    v-model="form.fields.type"
                    :error="form.errors.type"
                    id="type"
                    name="type"
                    :options="types"
                    placeholder="Payment Method Type..."
                />
            </div>

            <div class="sm:col-span-3">
                <label
                    for="network"
                    class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200"
                >
                    Network
                </label>
            </div>
            <div class="sm:col-span-9">
                <SharedFormBaseSelect
                    v-model="form.fields.network"
                    :error="form.errors.network"
                    id="network"
                    name="network"
                    :options="
                        form.fields.network === 'bank'
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

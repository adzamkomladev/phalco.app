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
        <div class="grid gap-2 sm:gap-6">
            <div class="">
                <SharedFormBaseAdvanceSelect
                    hide-on-select
                    v-model="form.fields.channel_code"
                    :error="form.errors.channel_code"
                    id="channel_code"
                    name="channel_code"
                    :options="channels"
                    placeholder="Payment Method Channel..."
                    position="bottom-center"
                    options-class=""
                    option-class="py-1"
                    select-class="w-full py-3"
                />
            </div>

            <div class="">
                <SharedFormBaseAdvanceSelect
                    has-icon
                    hide-on-select
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
                    position="bottom-center"
                    options-class=""
                    option-class="py-2  flex gap-4"
                    select-class="w-full py-3"
                />
            </div>

            <div class="">
                <SharedFormBaseInput
                    v-model="form.fields.account_name"
                    :error="form.errors.account_name"
                    id="account_name"
                    name="account_name"
                    placeholder="Full Name on Payment Method"
                />
            </div>

            <div class="">
                <SharedFormBaseInput
                    v-model="form.fields.account_number"
                    :error="form.errors.account_number"
                    id="account_number"
                    name="account_number"
                    placeholder="Account Number"
                />
            </div>
        </div>

        <div class="mt-8 flex justify-end gap-x-2">
            <SharedFormSubmitButton text="Create Account" />
        </div>
    </form>
</template>

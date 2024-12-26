<script setup lang="ts">
const props = defineProps<{
    senderOptions: { label: string; value?: number | null }[];
}>();

const form = useForm({
    method: "POST",
    url: route("campaigns.sms.senders.store"),
    fields: {
        sender_id: "",
        audience_id: "",
        message: "",
        wallet_id: null,
        scheduled_at: null,
    },
    hooks: {
        success: () => form.reset(),
    },
});

const time = ref("");
const date = ref("");
</script>

<template>
    <form
        class="md:grid grid-flow-col gap-4 mt-5"
        @submit.prevent="form.submit"
    >
        <div class="grid gap-5">
            <SharedFormBaseAdvanceSelect
                placeholder="Sender"
                error="form.fields.sender_id"
                :options="senderOptions"
                v-model="form.fields.sender_id"
            />

            <SharedFormBaseAdvanceSelect
                placeholder="Audience"
                error="form.fields.audience_id"
                :options="senderOptions"
                v-model="form.fields.audience_id"
            />

            <SharedFormBaseTextarea
                label="Input Campaign Message"
                v-model="form.fields.message"
                placeholder="Type Your Message"
            />

            <div class="flex gap-4 _sm:flex-col">
                <div class="grow">
                    <SharedFormBaseDatePicker
                        label="Schedule At"
                        placeholder="dd/mm/yy"
                        v-model="date"
                    />
                </div>

                <SharedFormBaseTimePicker
                    label="Time"
                    input-container-class="place-contents-center"
                    v-model="time"
                />
            </div>

            <div class="mt-10 flex justify-end gap-x-2">
                <SharedFormSubmitButton
                    text="Create"
                    :loading="form.processing"
                />
            </div>
        </div>

        <div class="w-full">
            <SharedFormBaseAdvanceSelect
                placeholder="Wallet"
                error="form.fields.wallet_id"
                :options="senderOptions"
                v-model="form.fields.wallet_id"
            />
        </div>
        <div></div>
    </form>
</template>

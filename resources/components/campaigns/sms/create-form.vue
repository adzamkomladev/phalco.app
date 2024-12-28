<script setup lang="ts">
import { Option } from '@/interfaces/shared/common.interface';

const props = defineProps<{
    senderOptions: Option[];
    audienceOptions: Option[];
    walletOptions: Option[];
}>();

const form = useForm({
  method: "POST",
  url: route("campaigns.sms.store"),
  fields: {
    sender_id: "",
    audience_id: "",
    message: "",
    wallet_id: null,
    scheduled_at: null as string | null,
  },
  hooks: {
    success: () => form.reset(),
  },
});

const time = ref("0:00");
const date = ref<Date>(new Date());

watchEffect(() => {
  if (time.value) {
    const [hours, minutes] = time.value.split(":").map(Number);
    if (!isNaN(hours) && !isNaN(minutes)) {
      date.value.setHours(hours, minutes, 0, 0);
      form.fields.scheduled_at = date.value.toISOString();
    } else {
      console.warn("Invalid time format:", time.value);
    }
  }
});

</script>

<template>
  <form class="grid md:grid-cols-5 gap-10 mt-5" @submit.prevent="form.submit">

    <div class="grid gap-5  md:col-span-3">
      <div>
          <h2 class="text-base font-medium text-gray-800 dark:text-gray-200">
            Create Campaign
        </h2>
        <p class="text-sm text-gray-600 dark:text-gray-400">
           Fill in the campaign details
        </p>
      </div>

      <SharedFormBaseAdvanceSelect
        placeholder="Sender"
        error="form.fields.sender_id"
        :options="senderOptions"
        v-model="form.fields.sender_id"
      />

      <SharedFormBaseAdvanceSelect
        placeholder="Audience"
        error="form.fields.audience_id"
        :options="audienceOptions"
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

    </div>

     <div class=" w-full flex flex-col gap-5 md:row-span-2  md:col-span-2">
      <div>
         <h2 class="text-base font-medium text-nowrap text-gray-800 dark:text-gray-200">
            Cost Of campaigning Message
        </h2>
        <p class="text-sm text-gray-600 dark:text-gray-400">
           Manage the cost of
        </p>
      </div>

        <SharedFormBaseAdvanceSelect
          placeholder="Wallet"
          error="form.fields.wallet_id"
          :options="walletOptions"
          v-model="form.fields.wallet_id"
        />
          <CampaignsSmsCreateTransactionDetails/>
      </div>
     <div class="flex justify-end gap-x-2   md:col-span-3 md:row-start-2">
        <SharedFormSubmitButton text="Create" :loading="form.processing" />
      </div>
  </form>
</template>

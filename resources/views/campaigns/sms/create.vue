<script setup lang="ts">
useHead({
    title: "Create New SMS Campaigns",
});

const props = defineProps<{
    senders: App.Data.Campaigns.Sms.SenderData[];
}>();
const senderOptions = ref<{ label: string; value?: number|null }[]>([]);

senderOptions.value = props.senders.map(({ id, sender }) => ({
  value: id,
  label: sender,
}))

</script>

<template layout="main">
 <div
        class="max-w-[90rem] px-4 text-gray-800 dark:text-gray-300 sm:px-6 lg:px-8 mx-auto"
    >
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">
            Create new <span class="text-primary-300">sms</span> Campaign
        </h2>
        <p class="text-sm text-gray-600 dark:text-gray-400">
           Plan SMS campaigns and preview costs instantly 
        </p>

        <div
            class=""
        >
     
        </div>
<div>
    <div>
<CampaignsSmsCreateForm
:sender-options="senderOptions"

/>
    </div>
    <div>
        <!-- cost -->
    </div>
</div>
     
    </div>
</template>

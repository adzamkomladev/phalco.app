<script setup lang="ts">
import ContactShowImage from "~/resources/svg/main/contact_show.svg?svg";

useHead({
    title: "Audience: Contact Details",
});

const props = defineProps<{
    contact: any;
}>();
</script>

<template>
    <SharedCommonOverlay
        class="max-w-xl _sm:max-w-full"
        title="Contact Details"
    >
    <div class="mb-10">
     <div
            class="flex p-4 _sm:p-2 flex-row-reverse rounded-3xl bg-secondary-300 dark:bg-gradient-to-r from-secondary-950 to-secondary-800"
        >
            <div class="font-medium  place-self-center basis-1/2 shrink-0 grow">
                <p class="text-gray-50 text-lg dark:text-gray-100">
                    CONTACT DETAILS
                </p>
                <p class="font-normal text-xs dark:text-gray-300 text-gray-100">
                create a new contact or upload a file of contacts 
                </p>
            </div>
            <div class="h-52 p-5 _xs:size-40 shrink-0">
                <img
                    :src="ContactShowImage"
                    class=" h-full w-auto"
                />
            </div>
        </div>
<div>
    <AudiencesContactShow :contact="contact"/>
</div>    


</div>    
    </SharedCommonOverlay>
</template>

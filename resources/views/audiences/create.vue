<script setup lang="ts">
import PolloingStationImage from "~/resources/images/voting/new_audience.png?src";


useHead({
    title: "New Audience",
});

const elections: any = useProperty("elections.all");


</script>

<template>
    <SharedCommonOverlay
        class="max-w-xl _sm:max-w-full"
        title="New Audience"
        size="xl"
    >
 <div
            class="flex flex-row-reverse rounded-3xl bg-secondary-300 dark:bg-gradient-to-r from-secondary-950 to-secondary-800"
        >
            <div class="font-medium pt-10 basis-1/2 shrink-0 grow">
                <p class="text-gray-50 text-lg dark:text-gray-100">
                    Add new Audiennce
                </p>
                <p class="font-normal text-xs dark:text-gray-300 text-gray-100">
                    have all your audiece uploaded for simple campain 
                </p>
            </div>
            <div class="h-60 p-5 shrink-0">
                <img
                    :src="PolloingStationImage"
                    class="_sm:hidden h-full w-auto"
                />
            </div>
        </div>

       <AudiencesCreateForm :elections="elections" />
    </SharedCommonOverlay>
</template>

<script setup lang="ts">
import { ElectionCandidateProps } from '~/resources/interfaces/voting/polling-stations/index.interface';

const props = defineProps<ElectionCandidateProps>();

</script>

<template>
    <div class="flex borde p-2 shadow justify-between m-2 rounded-md">
        <div class="flex items-center gap-x-3 ">
            <div class="font-bold text-2xl">#1</div>

            <img
                class="inline-block bg-gray-800/5 size-[38px] rounded-full"
                :src="candidatePicture"
                alt="Logo"
            />
            <div class="grow">
                <span
                    class="block lg:whitespace-nowrap font-semibold text-gray-800 dark:text-gray-200"
                >
                    {{candidateName}}
                </span>
                <span class="block text-sm text-gray-500"> {{ partyNameAbrev }} </span>
            </div>
        </div>
        
        <div class=" w-fit flex justify-end items-center gap-4 _sm:gap-2">
          
          <img class="max-h-8 " :src="partyLogo"/>
        <div class=" w-fit">
        <p class="font-semibold ">{{ votes }}</p>
        <p class="text-black/50 text-xs leading-[0]">Votes</p>
       </div>
        </div>
    </div>
</template>

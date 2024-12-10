<script setup lang="ts">
import { ElectionCandidateProps } from '~/resources/interfaces/voting/polling-stations/index.interface';

const props = defineProps<ElectionCandidateProps & { index: number }>();

const formatedindex=props.index+1;
</script>

<template>
    <div 
                       :class="[formatedindex==1 ?'bg-secondary-400 dark:bg-secondary-800  text-white ':'']"

    class="flex borde p-2 shadow justify-between m-2 rounded-md">
        <div class="flex items-center gap-x-3 ">

            <img
                class="inline-block bg-gray-800/5 size-[38px] rounded-full"
                :src="candidatePicture"
                alt="Logo"
            />
            <div class="grow">
                <span
               :class="[formatedindex==1 ?' ':'']"

                    class="block lg:whitespace-nowrap font-semibold  dark:text-gray-200"
                >
                    {{candidateName}}
                </span>
                <span class="block text-sm "> {{ partyNameAbrev }} </span>
            </div>
        </div>
        
        <div class=" w-fit flex justify-end items-center gap-4 _sm:gap-2">
          
          <img class="max-h-8 " :src="partyLogo"/>
        <div class=" md:flex items-center gap-2">
        <p class="font-semibold ">{{ votes }}</p>
        <p class="opacity-90 text-xs ">Votes</p>
       </div>
                  
        </div> 
        <div 
                   :class="[formatedindex==1 ?'bg-yellow-500  text-white font-bold ':'']"
                   class="font-bold text-lg rounded-full mx-2 size-8 flex items-center justify-center">{{formatedindex}}</div>

    </div>
</template>

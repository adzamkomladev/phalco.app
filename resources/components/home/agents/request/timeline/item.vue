<script setup lang="ts">
import { Stage } from "~/resources/interfaces/elections/selected.interface";

const props = defineProps<{  index: number; length: number }>();
import { formatDate } from "~/resources/utils/shared/date";


</script>

<template>
    <div
        v-motion-fade-visible
        :delay="50 * index"
        class="grid grid-cols-7 gap-x-5 ms-1"
        :class="length == index + 1 && 'grow'"
    >
     
        <div
       
          :class="(index===length-1) ?'after:hidden': ''"
            class="after:bg-forest-300 dark:after:bg-forest-600 relative last:after:hidden col-span-1 after:absolute after:top-8 after:bottom-0 flex justify-center after:w-px after:-translate-x-[0.5px]"
        >
            <div
                class="relative z-10 size-8 aspect-square flex justify-center items-center"
            >
              
                <span
                    class="size-5 absolute flex justify-center items-center bg-forest-500 dark:bg-forest rounded-full"
                >
            <SharedCommonIcon name="check" class="text-white size-3" />
            </span>
            </div>
        </div>
        <!-- :delay="60 * index * index" -->

        <div class="pt-1 col-span-6 pb-8 sm:pb-12 overflow-hidden">
            <div
                class=""
                v-motion-pop-visible-once
                :duration="200"
                :delay="100 * index"
            >
                <p class="text-sm font-semibold ">{{ 'Komla'}}</p>
    <span
                :class="
                        'text-black/50 text-xs dark:text-gray-100 font-medium'
                     
                "
                >{{ formatDate(new Date(), "dd/mm/yy") }}</span> 
                <div class="flex items-center gap-x-3 ">
                    <img
                        class="inline-block size-[25px] rounded-full"
                        :src="''"
                        alt="Logo"
                    />
                    <div class="grow">
                        <span
                            class="block whitespace-nowrap font-medium  text-gray-800 dark:text-gray-200 text-xs"
                        >
                            {{ 'Komla adzam'}}
                        </span>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- :delay="50 * index * index" -->
    </div>
</template>

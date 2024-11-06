<script setup lang="ts">
import { ElectionStageProps } from '~/resources/interfaces/elections/create.interface';

const props=defineProps<{stage:ElectionStageProps}>();

</script>

<template>
 <div
        v-motion-fade-visible

        class="flex gap-x-5 ms-1"
    >

    <div class="">
dd/mm/yy
    </div>
        <div
            class="relative last:after:hidden after:absolute after:top-8 after:bottom-0 after:start-4 after:w-px after:-translate-x-[0.5px] after:bg-gray-200"
        >
            <div class="relative z-10 size-8 flex justify-center items-center">
                <SharedCommonIcon
                    v-motion-pop-visible-once
                    :duration="360"
                    name="hexagon"
                    class=""
                />
            </div>
        </div>
                    <!-- :delay="60 * index * index" -->

        <div class="grow pt-0.5  pb-8 sm:pb-12 overflow-hidden">
            <div
                class=""
                v-motion-slide-visible-once-right
                :duration="200"
            >
              <p>Result stage</p> 
              <p class="text-xs text-gray-500">Get info about election</p> 
            
            </div>
        </div>
                        <!-- :delay="50 * index * index" -->

    </div>
</template>
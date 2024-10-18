<script setup lang="ts">
const props =defineProps<{requirement:string}>();

</script>

<template>
    <div class="flex gap-x-5 ms-1">
        <!-- Icon -->
        <div
            class="relative last:after:hidden after:absolute after:top-8 after:bottom-0 after:start-4 after:w-px after:-translate-x-[0.5px] after:bg-gray-200"
        >
            <div class="relative z-10 size-8 flex justify-center items-center">
                <SharedCommonIcon name="hexagon" class=""  />
            </div>
        </div>

        <div class="grow pt-0.5 text-gray-500 pb-8 sm:pb-12">
    <p class="">{{requirement}}</p>
        </div>
    </div>
</template>

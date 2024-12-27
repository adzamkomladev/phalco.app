<script lang="ts" setup>
defineProps<{title:string,value:string,icon:string}>();

</script>

<template>
<div class="flex items-center justify-between" >
     <div class="flex gap-4 items-center">
                        <span
                            class="bg-slate-100 dark:bg-gray-700 p-2 rounded-lg"
                        >
                            <SharedCommonIcon
                                :name="icon"
                                stroke-width="2"
                                class="h-6"
                            />
                        </span>
                        <div>
                            <p class="font-semibold text-gray-600 dark:text-gray-400  text-base">{{ title }}</p>
                            <p class=" text-sm">
                                {{ value }}
                            </p>
                        </div>
                    </div>

                     <div class="group">
                        <SharedCommonIcon
                            name="poles"
                            class="size-6"
                            stroke-width="1"
                        />
                    </div>
</div>
    
</template>
<script lang="ts" setup>
defineProps<{title:string,value:}>();

</script>

<template>

     <div class="flex gap-4 items-center">
                        <span
                            class="bg-slate-100 dark:bg-gray-700 p-2 rounded-lg"
                        >
                            <SharedCommonIcon
                                name="users"
                                stroke-width="2"
                                class="h-6"
                            />
                        </span>
                        <div>
                            <p class="font-bold text-lg">Total Candidates</p>
                            <p class="font-semibold text-sm">
                                {{ stageStat.candidates }}8
                            </p>
                        </div>
                    </div>
</template>
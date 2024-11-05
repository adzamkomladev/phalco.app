<template>
<div class="font-medium   shadow-card _sm:shadow p-[8%] rounded-lg">
     <div>
                        <h2
                            class="text-xl font-semibold text-gray-800 dark:text-gray-200"
                        >
                            All Elections
                        </h2>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            Table of all your elections
                        </p>
                    </div>
                    

</div>
</template>

<script setup lang="ts">
import { ElectionStageProps } from "~/resources/interfaces/elections/create.interface";


const props = defineProps<ElectionStageProps>();


</script>

<style scoped>
</style>

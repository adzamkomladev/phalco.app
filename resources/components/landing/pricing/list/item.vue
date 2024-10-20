<script setup lang="ts">
const props = defineProps<{ offer: string }>();
</script>
<template>
    <li 
    
    class="flex items-center space-x-3">
        <div>
            <SharedCommonIcon size="14" name="check" />
        </div>

        <span class="text-thin">{{ offer }}</span>
    </li>
</template>

<script setup lang="ts">
const props = defineProps<{ offer: string }>();
</script>
<template>
    <li class="flex text-xs items-center space-x-3">
        <div>
            <SharedCommonIcon size="10" name="check" />
        </div>

        <span class="text-thin">{{ offer }}</span>
    </li>
</template>

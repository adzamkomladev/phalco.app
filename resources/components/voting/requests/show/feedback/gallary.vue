<script setup lang="ts">
import { ImageItemProp } from "~/resources/interfaces/voting/requests/show.interface";

const props = defineProps<{
    images: ImageItemProp[];
}>();
</script>

<template>
    <div class="grid grid-cols-2 gap-2">
        <!-- Render Images -->
        <div
            v-for="(image, index) in images"
            :key="index"
            class="relative overflow-hidden"
        >
            <img
                :src="image.src"
                :alt="image.description"
                class="w-full h-full object-cover"
            />
        </div>
    </div>
</template>

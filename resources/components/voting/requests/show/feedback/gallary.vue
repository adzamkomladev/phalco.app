<script setup lang="ts">
interface ImageItem {
    src: string;
    description: string;
    size: "small" | "medium" | "large"; // Define sizes for grid spans
}

// Props for images
const props = defineProps<{
    images: ImageItem[];
}>();

// Map size to grid classes
const sizeToClass = (size: string) => {
    switch (size) {
        case "large":
            return "col-span-2 row-span-2";
        case "medium":
            return "col-span-2 row-span-1";
        case "small":
        default:
            return "col-span-1 row-span-1";
    }
};
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

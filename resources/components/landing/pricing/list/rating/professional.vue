<script setup lang="ts">
import FireImage from "~/resources/svg/icon/fire.svg?url";
</script>

<template>
    <div
        class="flex absolute p-1 font-bold bg-[#07689F] items-center text-white rounded-full -top-4 left-[40%] px-3 -skew-x-2 rotate-[9deg] text-sm gap-1"
    >
        <img :src="FireImage" />
        <span>Most popular</span>
    </div>
</template>

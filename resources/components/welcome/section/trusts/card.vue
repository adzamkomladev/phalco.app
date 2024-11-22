<script setup lang="ts">

</script>


<template>
 <SharedCommonCard class="aspect-[7/4] hover:shadow-gray-500  hover:scale-110  peer peer-hover:scale-95 hover:z-10 duration-300 transition-all   flex flex-col justify-evenly sm:h-64 max-w-[90vw]">
<div class="">
    <div class="flex gap-5 px-5 _sm:px-0">
        <img class="rounded-full size-10 aspect-square" src="https://via.placeholder.com/150/0000FF/FFFFFF?text=John+Doe"/>
        <p>
            <p class="tet-sm font-semibold">Komla Adzam</p>
            <p>Owner of Phalco</p>
        </p>
    </div>
</div>
<div class="px-10 _sm:px-2 flex flex-col gap-2">


<p class="text-xs text-justify">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestiae sunt animi quod assumenda in. </p>
<div class="flex gap-1 place-content-end">
    <SharedCommonIcon v-for="l in 5" :key="l" name="star" class="text-[#FF9500]  size-5" />
</div></div>
    </SharedCommonCard>
</template>
<script setup lang="ts">

const props = defineProps<{
    service: {
        title: string;
        description: string;
        icon: { name: string; color: string };
    };
}>();

</script>

<template>
    <div>

  
    <div
        :style="{ backgroundColor: service.icon.color + 60 }"
        class=" rounded-xl flex flex-col md:w-fit aspect-square items-center justify-center text-center"
    >
    <div class=" aspect-square  flex items-center justify-center">
         <SharedCommonIcon
         class="h-28 w-28 p-4 sm:h-36 sm-w-36 md:h-20 md:w-20"
         :name="service.icon.name"
            :color="service.icon.color"
        />
    </div> <p class="font-bold md:hidden">{{ service.title }}</p>

 </div>
 <div class="_md:hidden">
     <p class="font-bold text-2xl text-bala">{{ service.title }}</p>

        <p class="text-lg text-pretty text-gray-600 ">{{ service.description }}</p>
 </div>
    </div>      
   
</template>

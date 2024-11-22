<script setup lang="ts">
import {FAQ} from '~/resources/interfaces/welcome/index.interface'

defineProps<{faq:FAQ}>();

const FaqIsOpened=ref(false)

</script>

<template>
    <SharedAnimationCollapsible class="sm:max-w-[80%]">
            <template v-slot:summary>
<buton class="flex justify-between font-bold py-3 pb-5 text-sm" @click="FaqIsOpened=!FaqIsOpened">
 <div>{{faq.question}}</div>   
    <div class=" text-wrap">
         <span v-if="FaqIsOpened" v-text="'-'"/>
    <span v-else v-text="'+'"/>
    </div>
   
</buton>
                
            </template>
<p class="pb-3">{{faq.answer}}</p>
            
        </SharedAnimationCollapsible>
</template>
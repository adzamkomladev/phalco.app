<script setup lang="ts">
const props = defineProps<{ methods: App.Data.Finance.PaymentMethodData[] }>();
const selectedMethiod =ref(props.methods[0]|| null)
const model=defineModel();
</script>
<template>
    <ul class="grid gap-4">
    
    <div
                            v-for="(method, index) in methods"
                            :key="index"
                            @click.prevent="selectedMethiod= method.id"
                            type="submit"
                            :class="[ selectedMethiod===method?.id ?'bg-secondary-400 shaddow text-white':'hover:bg-slate-50 text-gray-700 focus:text-gray-700 bg-white cursor-pointer']"
                            class="w-full  justify-between font-black text-gray-600  transition-all  shadow-card focus:text-white    h-16 _md:h-16 py-2 px-4 flex items-center gap-x-2 text-base xl:text-lg rounded-lg border-2 border-transparent   hover:opacity-90 focus:outline-none  disabled:opacity-50 disabled:pointer-events-none"
                        >
                                <div class="flex gap-2 items-center">
                                     <SharedCommonIcon class=" h-6 opacity-70" name="card" />

                                    <div  class="flex flex-col  text-left"> 
                                           <span class="font-semi-bold text-sm" >
                                        {{ method.account_name }}
                                    </span>
                                    <span class="font-thin text-xs  ">
                                        {{ method.account_number }}
                                    </span>
                                    </div>
                                 
                                </div>
                                <span class="text-xs font-medium uppercase">{{method.channel_name}}</span>
                                <div class= "place-contents-center">
                                                                    <SharedCommonIcon class="w-10 " :name="method.network_code || method.bank_code ||''" />

                                </div>  


                        </div>
    </ul>
</template>

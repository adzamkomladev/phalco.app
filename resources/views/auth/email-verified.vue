<script setup lang="ts">
useHead({
    title: "Email Verified",
});


</script>

<template layout="auth">
 
    <div class="grid grid-flow-row gap-5 py-5">
       <div class="text-center sm:landscape:text-left">
            <div
                class="text-black flex flex-row gap-8 items-center justify-center sm:landscape:justify-start dark:text-primary-700 font-black text-xl sm:text-2xl md:text-3xl xl:text-4xl"
            >
            <div>Congratulations</div>
            <SharedSvgIcon name="checkmark" size="32px"/>
            </div>
            <div>

            
            <p class="text-gray-500 font-normal text-base xl:text-lg">Your email has been successfully verified, Lets get started</p>
        </div>  </div>

        <router-link :href="route('home')">
                <SharedFormSubmitButton
                    text="Proceed"
                />
            </router-link>
        
         <div class="">
            <p class=" text-sm text-center sm:landscape:text-left text-gray-600 xl:text-base dark:text-neutral-400">
               Need help ?
                <router-link
                    class="text-primary-300 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500"
                >
                    Contact customer Support
                </router-link>
            </p>
        </div>
</div>
</template>

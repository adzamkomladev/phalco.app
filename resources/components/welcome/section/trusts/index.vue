<script setup lang="ts">
import ArrowImage from "~/resources/svg/welcome/trusted_1.svg?url";
import ObjectsImage from "~/resources/svg/welcome/3_objects.svg?url";
</script>

<template>
    <section id="contacts" class="bg-white py-8 scroll-mt-20">
        <div class="flex px-[8%] relative flex-col text-center gap-2 py-8">
            <img
                class="_sm:hidden absolute right-[10%] bottom-5"
                :src="ObjectsImage"
            />
            <img
                class="absolute w-[20%] left-0 bottom-1/2 _sm:hidden"
                :src="ArrowImage"
            />
            <p
                v-motion-fade-visible
                :duration="300"
                :delay="90"
                class="font-black font-sans text-3xl md:text-4xl"
            >
                Trusted By Many
            </p>
            <span
                v-motion-fade-visible
                :duration="360"
                :delay="90"
                class="text-gray-700 block self-center md:text-center lg:w-[50rem] text-balance"
            >
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore
            </span>
        </div>
        <SharedCommonSlideOnMouseEnter class=" ">
            <div class="flex group my-10">
                <WelcomeSectionTrustsCard
                    class="ml8"
                    :class="[
                        l === 2
                            ? 'sm:scale-[1.2] group-hover:ml-   sm:group-hover:scale-95 sm:hover:group-hover:scale-[1.2] group  z-[1]'
                            : ' mx-5 sm:hover:group-hover:scale-[1.2]',
                    ]"
                    v-for="l in 3"
                    :key="l"
                />
            </div>
        </SharedCommonSlideOnMouseEnter>
    </section>
</template>

<style scoped></style>

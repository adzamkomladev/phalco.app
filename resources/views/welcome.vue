<script setup lang="ts">
const imageWelcomeSm = new URL(
    "~/resources/svg/welcome/landing_sm.svg",
    import.meta.url,
).href;
const imageWelcomeLg = new URL(
    "~/resources/svg/welcome/landing_lg.svg",
    import.meta.url,
).href;
const imageAboutUs = new URL(
    "~/resources/svg/welcome/about_us.svg",
    import.meta.url,
).href;
const imageAboutUsBgLg = new URL(
    "~/resources/svg/welcome/about_bg_lg.svg",
    import.meta.url,
).href;
</script>

<template>
    <body class="bg-gray-100 md:bg-white md:text-lg">
        <LandingHeader />

        <main id="content">
            <section
                class="grid grid-cols-12 _md:flex flex-col-reverse overflow-hidden"
            >
                <div
                    class="col-span-6 bg-white _md:rounded-t-[3rem] px-8 pt-10 gap-2 flex flex-col"
                >
                    <p
                        class="font-black font-sans text-2xl sm:text-3xl md:block md:w-[130%]"
                    >
                        Election Management made easy
                    </p>

                    <p class="text-gray-400 text-balance md:text-pretty">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Cumque itaque exercitationem corporis aliquid quia
                        dolorem ut similique? Deserunt modi tenetur pariatur
                        quam, laboriosam expedita minima nihil reprehenderit non
                        ad atque.
                    </p>

                    <div class="py-2">
                        <button
                            class="p-2 w-full md:w-52 text-white bg-primary-500 rounded-md font-bold"
                        >
                            Get Started
                        </button>
                        <p
                            class="my-4 text-sm md:text-base sm:text-base text-gray-600 font-bold dark:text-neutral-400"
                        >
                            Already have an account ?
                            <router-link
                                class="text-primary-twi decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500"
                                :href="route('login')"
                            >
                                Login
                            </router-link>
                        </p>
                    </div>
                </div>
                <div class="py-8 col-span-6">
                    <img :src="imageWelcomeSm" class="md:hidden w-full p-10" />
                    <img :src="imageWelcomeLg" class="hidden md:block" />
                </div>
            </section>

            <section class="bg-white px-8">
                <div class="flex flex-col pb-8 md:items-center">
                    <div class="font-black py-2 font-sans text-2xl sm:text-3xl">
                        Our Service
                    </div>
                    <span
                        class="text-gray-400 block md:text-center md:w-[50rem] text-balance"
                        >Lorem ipsum dolor sit amet consectetur adipisicing
                        >Lorem ipsum dolor sit amet consectetur adipisicing
                        elitLorem ipsum dolor sit amet consectetur adipisicing
                        elit</span
                    >
                </div>
                <div>
                    <LandingServiceShow />
                </div>
            </section>
            <section class="bg-no-repeat bg-right bg-white py-10">
                <article class="py-8 px-8 flex flex-col md:items-center">
                    <div class="font-black font-sans text-2xl sm:text-3xl">
                        About Us
                    </div>
                    <div>
                        <span
                            class="text-gray-400 block md:text-center md:w-[50rem] md:text-balance"
                            >Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Cumque itaque exercitationem corporis aliquin
                            elit. Cumque itaque exercitationem corporis aliquid
                            .</span
                        >
                    </div>
                </article>
                <article
                    class="py-4 grid grid-cols-10 _md:flex flex-col-reverse"
                >
                    <div class="col-span-5 pl-8">
                        <p class="font-black font-sans text-2xl sm:text-3xl">
                            Requirements For our Users
                        </p>
                        <p>
                            <span class="text-gray-400 lg:w-[115%] block py-4"
                                >Lorem ipsum dolor sit amet , quae beatae ullam
                                tempore ratione repellendus amet dolorem
                                blanditiis, veritatis animi! Modi veritatis
                                placeat cupiditate. .</span
                            >
                        </p>
                        <LandingRequirementShow />
                        <div>
                            <button
                                class="rounded-full p-2 bg-primary-500 text-white px-8 flex items-center group justify-center gap-4"
                            >
                                <p>Learn more</p>
                                <SharedCommonIcon
                                    name="chevron"
                                    class="h-4 group-hover:opacity-90 transition-all group-hover:translate-x-3"
                                />
                            </button>
                        </div>
                    </div>

                    <div
                        class="relative overflow-hidden _md:bg-land-sm bg-contain bg-right bg-no-repeat _md:py-1 flex justify-center md:scale-x-[-1] transform col-span-5"
                    >
                        <img
                            class="transform absolute md:sm:scale-x-[-1] left-0 -top-[5%] -0 h-[110%] _md:hidden"
                            :src="imageAboutUsBgLg"
                        />
                        <img
                            class="transform w-full lg:-ml-[15%]"
                            :src="imageAboutUs"
                        />
                    </div>
                </article>
            </section>

            <section
                id="pricing"
                class="bg-white px-8 py-8 flex flex-col gap-8 place-content-center"
            >
                <div class="flex flex-col md:items-center">
                    <div class="font-black py-2 font-sans text-2xl sm:text-3xl">
                        Pricing
                    </div>
                    <span
                        class="text-gray-400 block md:text-center md:w-[50rem] text-balance"
                        >Lorem ipsum dolor sit amet consectetur adipisicing
                        >Lorem ipsum dolor sit amet consectetur adipisicing
                        elitLorem ipsum dolor sit amet consectetur adipisicing
                        elit</span
                    >
                </div>

                <div class="">
                    <LandingPricingShow />
                </div>
            </section>

            <section class="p-10 bg-white">
                <div
                    class="bg-community h-72 overflow-hidden bg-right rounded-[2rem] bg-cover bg-no-repeat"
                >
                    <div class="bg-[#0988D090] w-full h-full p-10">
                        <div
                            class="bg-[#0988D0ee] p-8 w-2/3 h-full rounded-3xl"
                        >
                            <p class="text-white">Join our community now</p>
                            <p class="text-white text-3xl font-semibold">
                                Start yor election management today
                            </p>
                            <form>
                                <div class="mb-6 flex pr-14">
                                    <input
                                        type="password"
                                        id="success"
                                        class="bg-green-50 border border-green-500 text-green-900 dark:text-green-400 text-sm rounded-l-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500"
                                        placeholder="Confirm Pin"
                                    />
                                    <button
                                        class="bg-[#0BC81E] bg- px-4 rounded-r-lg text-white font-bold text-lg"
                                    >
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <LandingFooterShow />
    </body>
</template>

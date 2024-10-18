<template>
    <header
        class="sticky top-0 backdrop-blur-lg overflow-hidden bg-[#ffffffee] md:py-4  _md:rounded-b-xl inset-x-0 flex flex-wrap md:justify-start md:flex-nowrap z-50 w-full"
    >
        <nav
            class="relative   w-full  md:flex md:items-center md:justify-between md:py-0  lg:mx-auto"
            aria-label="Global"
        >
            <div class="flex px-8 justify-between ">
                <!-- Logo -->
               
                <router-link>
                    <SharedCommonIcon class="text-primary-500" name="logo_full" />
                </router-link>
                <!-- End Logo -->

                <div class="md:hidden">
                    <button
                        type="button"
                        class="hs-collapse-toggle size-8 flex justify-center items-center text-sm font-semibold rounded-full  text-primary-500 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-collapse="#navbar-collapse"
                        aria-controls="navbar-collapse"
                        aria-label="Toggle navigation"
                    >
<svg class="hs-collapse-open:hidden flex-shrink-0 size-4"
    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
    <line x1="3" x2="21" y1="6" y2="6" />
    <line x1="3" x2="21" y1="12" y2="12" />
    <line x1="3" x2="21" y1="18" y2="18" />
</svg>                    
<svg class="hs-collapse-open:block hidden flex-shrink-0 size-4"
    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
    <path d="M18 6 6 18" />
    <path d="m6 6 12 12" />
</svg>


</button>
                </div>
            </div>
            <LandingHeaderMenu />
        </nav>
    </header>
</template>

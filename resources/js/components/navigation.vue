<template>
    <header>
        <nav class="container">
            <div class="branding">
                <router-link class="header" :to="{name: 'Home'}">OpenWeather</router-link>
            </div>
            <div class="nav-links">
                <ul v-show="!mobile">
                    <router-link class="link" :to="{name: 'Search'}">Search</router-link>
                    <router-link class="link" :to="{name: 'History'}">History</router-link>
                </ul>
            </div>
        </nav>
        <svg @click="toggleMobileNav" v-show="mobile" aria-hidden="true" focusable="false" data-prefix="far" data-icon="bars" class="menu-icon svg-inline--fa fa-bars fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M436 124H12c-6.627 0-12-5.373-12-12V80c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12zm0 160H12c-6.627 0-12-5.373-12-12v-32c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12zm0 160H12c-6.627 0-12-5.373-12-12v-32c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12z"></path></svg>
        <transition name="mobile-nav">
            <ul class="mobile-nav" v-show="mobileNav" @click="toggleMobileNav">
                <router-link class="link" :to="{name: 'Search'}">Search</router-link>
                <router-link class="link" :to="{name: 'History'}">History</router-link>
            </ul>
        </transition>
    </header>
</template>

<script>
export default{
    name: 'Navigation',
    data() {
        return{
            mobile: null,
            mobileNav: null,
            windowWidth: null
        };
    },
    created() {
        window.addEventListener('resize', this.checkScreen);
        this.checkScreen()
    },
    methods:{
        checkScreen() {
            this.windowWidth = window.innerWidth
            if(this.windowWidth <= 750) {
                this.mobile = true;
                return;
            }
            this.mobile = false;
            this.mobileNav = false;
            return;
        },

        toggleMobileNav() {
            this.mobileNav = !this.mobileNav
        }
    }


}

</script>

<style lang="scss" scoped>
header{
    background-color: #fff;
    padding: 0 25px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    z-index: 99;

    .link{
        font-weight: 500;
        padding: 0 8px;
        transition: .3s color ease;
        text-decoration: none;
        font-size: 20px;
        &:hover {
            color: #1eb8b8;
        }
    }

    nav{
        display: flex;
        padding: 25px 0;

        .branding{
            display: flex;
            align-items: center;

            .header{
                font-weight: 600;
                font-size: 24px;
                color: #000;
                text-decoration: none;
            }
        }

        .nav-links{
            position: relative;
            display: flex;
            flex: 1;
            align-items: center;
            justify-content: flex-end;

            ul{
                margin-right: 32px;

                .link{
                    margin-right: 32px;
                }

                .link:last-child {
                    margin-right: 0;
                }
            }
        }
    }

    .menu-icon{
        cursor: pointer;
        position: absolute;
        top: 32px;
        right: 25px;
        height: 25px;
        width: auto;
    }

    .mobile-nav{
        padding: 20px;
        width: 70%;
        max-width: 250px;
        display: flex;
        flex-direction: column;
        position: fixed;
        height: 100%;
        background-color: #303030;
        top: 0;
        left: 0;

        .link{
            padding: 15px 0;
            color: #fff;
        }
    }

    .mobile-nav-enter-active,
    .mobile-nav-leave-active{
        transition: all 1s ease;
    }

    .mobile-nav-enter{
        transform: translateX(-250px);
    }
    .mobile-nav-enter-to{
        transform: translateX(0);
    }
    .mobile-nav-leave-to{
        transform: translateX(-250px);
    }
}
</style>

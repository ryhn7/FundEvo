        <!-- Navbar -->
        <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all shadow-none duration-250 ease-soft-in rounded-2xl lg:flex-nowrap lg:justify-start"
            navbar-main navbar-scroll="true">
            <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
                <nav>
                    <!-- breadcrumb -->
                    <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                        <li class="leading-normal text-sm">
                            <a class="opacity-50 text-slate-700" href="javascript:;">Pages</a>
                        </li>
                        <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']"
                            aria-current="page">Dashboard</li>
                    </ol>
                    <h6 class="mb-0 font-bold capitalize">Dashboard</h6>
                </nav>

                <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
                    <div class="flex items-center md:ml-auto md:pr-4">
                    </div>
                    <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
                        <li class="flex items-center">
                            <div
                                class="block px-0 py-2 font-semibold transition-all ease-nav-brand text-sm text-slate-500">
                                <i class="fa fa-user sm:mr-1"></i>
                                <span class="hidden sm:inline">Hello, {{ Auth::user()->name }}</span>
                            </div>
                        </li>


                        <!-- notifications -->

                        <li class="relative flex items-center px-4">

                            <div x-data="{
                                open: false,
                                toggle() {
                                    if (this.open) {
                                        return this.close()
                                    }
                            
                                    this.$refs.button.focus()
                            
                                    this.open = true
                                },
                                close(focusAfter) {
                                    if (!this.open) return
                            
                                    this.open = false
                            
                                    focusAfter && focusAfter.focus()
                                }
                            }" x-on:keydown.escape.prevent.stop="close($refs.button)"
                                x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                                x-id="['dropdown-button']" class="relative">

                                <button x-ref="button" x-on:click="toggle()" :aria-expanded="open"
                                    :aria-controls="$id('dropdown-button')" type="button"
                                    class="block p-0 transition-all text-sm ease-nav-brand text-slate-500">
                                    <i class="cursor-pointer fa fa-cog"></i>
                                </button>

                                <div x-ref="panel" x-show="open" x-transition.origin.top.left
                                    x-on:click.outside="close($refs.button)" :id="$id('dropdown-button')"
                                    style="display: none;"
                                    class="text-sm before:font-awesome before:leading-default before:duration-350 before:ease-soft lg:shadow-soft-3xl duration-250 min-w-44 before:sm:right-7.5 before:text-5.5 absolute right-0 top-0 mt-5 w-40 rounded-lg bg-white shadow-md z-50 bg-clip-padding px-2 py-4 text-left text-slate-500 sm:-mr-6 lg:absolute lg:right-0 lg:left-auto lg:block lg:cursor-pointer">
                                    <div
                                        class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm">

                                        <p>Role: <span class="text-slate-700 font-semibold">
                                                {{ Auth::user()->role->name }}</span></p>
                                    </div>

                                    </a>
                                    <form action="/logout" method="POST" class="">
                                        @csrf
                                        <button
                                            class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                                            <span class="text-red-600">Log
                                                Out</span></button>
                                    </form>

                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- end Navbar -->

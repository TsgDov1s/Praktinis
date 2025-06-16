<nav class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Left-aligned navigation links -->
            <div class="flex space-x-8">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    <span class="nav-item">Suvestinė</span>
                </x-nav-link>
                <x-nav-link :href="route('transactions.index')" :active="request()->routeIs('transactions.*')">
                    <span class="nav-item">Transakcijos</span>
                </x-nav-link>
                <x-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.*')">
                    <span class="nav-item">Kategorijos</span>
                </x-nav-link>
            </div>

            <!-- Right-aligned user/logout -->
            <div class="flex items-center">
                <div class="ml-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-lg hover:text-gray-700 focus:outline-none transition">
                                <span class="nav-item">Dovydas</span>
                                <svg class="ml-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Logout -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    <span class="nav-item">Atsijungti</span>
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
        </div>
    </div>
</nav>

<style>
    .nav-item {
        position: relative;
        font-size: 1.125rem; /* 18px */
        padding-bottom: 4px;
    }

    .nav-item::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: 0;
        left: 0;
        background-color: #3b82f6; /* Blue-500 */
        transition: width 0.3s ease;
    }

    .nav-link:hover .nav-item::after,
    .dropdown-link:hover .nav-item::after {
        width: 100%;
    }

    .dropdown-link .nav-item::after {
        background-color: #6b7280; /* Gray-500 */
    }
</style>
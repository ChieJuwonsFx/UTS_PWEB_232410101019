<nav class="bg-white border-gray-200 sticky w-full z-20 shadow-md">
    <div class="max-w-full flex flex-wrap items-center justify-between mx-auto py-4 px-4 lg:px-10 md:px-6 sm:px-4">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <span class="self-center text-2xl font-semibold whitespace-nowrap text-[#1E376A]">InnoVixus</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 md:hidden hover:bg-gray-100">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul
                class="items-center font-medium flex flex-col p-4 md:p-0 mt-4 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white">
                <li>
                    <a href="{{ route('dashboard', ['username' => $username]) }}"
                        class="{{ request()->is('/') ? 'text-[#1E376A] relative md:after:content-[\'\'] md:after:absolute md:after:bottom-0 md:after:left-0 md:after:w-full md:after:h-1 md:after:bg-[#1E376A] md:after:rounded-full' : 'text-gray-500 hover:text-[#1E376A]' }} block py-2 px-3">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('pengelolaan', ['username' => $username]) }}"
                        class="{{ request()->is('pengelolaan') ? 'text-[#1E376A] relative md:after:content-[\'\'] md:after:absolute md:after:bottom-0 md:after:left-0 md:after:w-full md:after:h-1 md:after:bg-[#1E376A] md:after:rounded-full' : 'text-gray-500 hover:text-[#1E376A]' }} block py-2 px-3">
                        Pengelolaan
                    </a>
                </li>
                <li>
                    <a href="{{ route('profile', ['username' => $username]) }}"
                        class="{{ request()->is('profile*') ? 'text-[#1E376A] relative md:after:content-[\'\'] md:after:absolute md:after:bottom-0 md:after:left-0 md:after:w-full md:after:h-1 md:after:bg-[#1E376A] md:after:rounded-full' : 'text-gray-500 hover:text-[#1E376A]' }} block py-2 px-3">
                        Profil
                    </a>
                </li>

                <div class="flex space-x-2">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="text-white bg-[#1E376A] hover:bg-white hover:text-[#1E376A] border border-[#1E376A] font-medium rounded-lg text-sm px-4 py-2 text-center">
                            Logout
                        </button>
                    </form>
                </div>
            </ul>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const hamburgerButton = document.querySelector('[data-collapse-toggle="navbar-default"]');
        const menu = document.getElementById('navbar-default');

        hamburgerButton.addEventListener('click', function() {
            menu.classList.toggle('hidden');
        });
    });
</script>

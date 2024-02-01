<template>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="/">Laravel</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <template v-if="!$page.props.auth.user">
                            <li class="nav-item">
                                <a class="nav-link" :href="route('login')">Login</a>
                            </li>
                            <!--
                            <li class="nav-item">
                                <a class="nav-link" :href="route('register')">Register</a>
                            </li>
                            -->
                        </template>
                        <template v-else>
                            <li class="nav-item">
                                <a class="nav-link" :href="route('history')">History</a>
                            </li>
                            <li class="nav-item nav-link">
                                Balance: {{ $page.props.auth.user.wallet_balance.value }}
                            </li>
                            <li class="nav-item dropdown">
                                <a
                                    id="navbarDropdown"
                                    class="nav-link dropdown-toggle"
                                    href="#"
                                    role="button"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    {{ $page.props.auth.user.name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a
                                        class="dropdown-item"
                                        @click="$inertia.post(route('logout'))"
                                    >
                                        Logout
                                    </a>
                                </div>
                            </li>
                        </template>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <slot/>
            </div>
        </main>
    </div>
</template>
<script setup>
</script>

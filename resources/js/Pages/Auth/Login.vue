<script setup>
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import {useForm} from "@inertiajs/vue3";

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const handleLogin = (e) => {
    e.preventDefault();
    form.post('login');
};
</script>

<template>
    <DefaultLayout>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Login</div>

                        <div class="card-body">
                            <form @submit="handleLogin">
                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>

                                    <div class="col-md-6">
                                        <input
                                            id="email"
                                            type="email"
                                            :class="{
                                                'form-control': true,
                                                'is-invalid': $page.props.errors.email,
                                            }"
                                            name="email"
                                            v-model="form.email"
                                            autocomplete="email"
                                            autofocus
                                        />

                                        <span class="invalid-feedback" role="alert" v-if="$page.props.errors.email">
                                            <strong>{{ $page.props.errors.email }}</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

                                    <div class="col-md-6">
                                        <input
                                            v-model="form.password"
                                            id="password"
                                            type="password"
                                            :class="{
                                                'form-control': true,
                                                'is-invalid': $page.props.errors.password,
                                            }"
                                            name="password"
                                            autocomplete="current-password"
                                        />

                                        <span class="invalid-feedback" role="alert" v-if="$page.props.errors.password">
                                            <strong>{{ $page.props.errors.password }}</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input
                                                v-model="form.remember"
                                                class="form-check-input"
                                                type="checkbox"
                                                name="remember"
                                                id="remember"
                                            />

                                            <label class="form-check-label" for="remember">Remember Me</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Login
                                        </button>

                                        <!--
                                        <a class="btn btn-link" :href="route('password.request')">
                                            Forgot Your Password?
                                        </a>
                                        -->
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </DefaultLayout>
</template>

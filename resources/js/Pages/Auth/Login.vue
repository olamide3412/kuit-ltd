<script setup>
import { Link, useForm, usePage } from '@inertiajs/vue3'
import { ref, computed, onMounted } from 'vue'
import Logo from '../../../images/logo.png'
import TextInput from '@/Components/Forms/TextInput.vue';
import { useToast } from 'vue-toastification';

const toast = useToast();
const flashMsg = usePage().props.flash.message;
const siteLogo = computed(() => usePage().props.site?.logo_url || Logo);
const form = useForm({
  login: null,
  password: null,
  remember: false,
  cf_turnstile_response: '',
});

const turnstileWidgetId = ref(null);
const isTurnstileLoaded = ref(false);
const turnstileError = ref('');

// Load Cloudflare Turnstile script
const loadTurnstile = () => {
    if (window.turnstile) {
        renderTurnstile();
        return;
    }

    const script = document.createElement('script');
    script.src = 'https://challenges.cloudflare.com/turnstile/v0/api.js?render=explicit';
    script.async = true;
    script.defer = true;

    script.onload = () => {
        isTurnstileLoaded.value = true;
        renderTurnstile();
    };

    script.onerror = () => {
        turnstileError.value = 'Failed to load CAPTCHA. Please refresh the page.';
    };

    document.head.appendChild(script);
};
// Render Turnstile widget
const renderTurnstile = () => {
    if (window.turnstile && document.getElementById('cf-turnstile-widget')) {
        turnstileWidgetId.value = window.turnstile.render('#cf-turnstile-widget', {
            sitekey: usePage().props.turnstileSiteKey,
            callback: (token) => {
                form.cf_turnstile_response = token;
                turnstileError.value = '';
            },
            'expired-callback': () => {
                form.cf_turnstile_response = '';
                turnstileError.value = 'CAPTCHA expired. Please verify again.';
                resetTurnstile();
            },
            'error-callback': () => {
                form.cf_turnstile_response = '';
                turnstileError.value = 'CAPTCHA error. Please try again.';
                resetTurnstile();
            }
        });
    }
};
// Reset Turnstile widget
const resetTurnstile = () => {
    if (window.turnstile && turnstileWidgetId.value) {
        window.turnstile.reset(turnstileWidgetId.value);
    }
};
// Reload Turnstile
const reloadTurnstile = () => {
    resetTurnstile();
    form.cf_turnstile_response = '';
    turnstileError.value = '';
};
// Load Turnstile when component mounts
onMounted(() => {
    loadTurnstile();
});

const handleLogin = () => {
    // Bypass Turnstile dynamically for ease of local testing
    // if (!form.cf_turnstile_response) {
    //     turnstileError.value = 'Please complete the CAPTCHA verification';
    //     return;
    // }
  // Handle login logic here
  form.post(route('login'),{
        onFinish: () => {
            form.reset('password');
            // Reset Turnstile after submission
            resetTurnstile();
        },
        onError: () => {
            form.reset("password");
            toast.error(form.errors.login ?? 'Something went wrong try again');

             // Reset Turnstile on error
            if (errors.cf_turnstile_response) {
                resetTurnstile();
                form.cf_turnstile_response = '';
            }
        },
        onSuccess: () => {
            //toast.success('Login succesfull!!!');
            if(flashMsg){
                toast.error(flashMsg);
            }
            form.reset();
        }
    });
}


</script>
<template>

    <div class="min-h-screen  flex items-center justify-center px-4 my-6">

      <!-- Login Card -->
      <div
        class="w-full max-w-md bg-white rounded-lg shadow-lg p-5 space-y-6"
        data-aos="zoom-out"
        data-aos-duration="600">
        <!-- Logo & Brand Header -->
        <div class="text-center">
          <Link href="/" class="inline-flex items-center space-x-3 mb-3 group" title="Return to homepage">
            <img
              :src="siteLogo"
              alt="KUIT LIMITED Logo"
              class="w-12 h-12 object-contain rounded-xl shadow-md group-hover:scale-105 transition-transform"
            />
            <div class="text-left leading-tight">
              <span class="text-2xl font-black tracking-tight text-slate-900 flex items-center">
                KUIT<span class="text-amber-500 ml-1">LTD</span>
              </span>
              <p class="text-[10px] text-slate-500 tracking-wider font-bold uppercase">
                Marine · Construction · Engineering
              </p>
            </div>
          </Link>
          <h2 class="text-xl font-bold text-gray-800">Login to Your Account</h2>
          <p class="text-xs text-gray-500 mt-1">Welcome back! Please login to continue.</p>
        </div>

        <!-- Form -->
        <form @submit.prevent="handleLogin" class="mt-6 space-y-6">
          <!-- Username or Email -->
          <TextInput name="login" label="Username or Email" v-model="form.login"
            type="text" placeholder="admin or admin@kuitltd.com" :message="form.errors.login"
            autofocus autocomplete="username" :required="true"/>
           <!-- Password -->
          <TextInput name="password" label="Password" type="password"
            v-model="form.password" placeholder="••••••••"
            :required="true" autocomplete="current-password"/>

                 <!-- Cloudflare Turnstile Widget -->
                <div class="flex justify-left">
                    <div id="cf-turnstile-widget" class="cf-turnstile"></div>
                </div>
                <div v-if="turnstileError" class="text-red-600 text-sm text-center">
                    {{ turnstileError }}
                </div>
                <div v-if="form.errors.cf_turnstile_response" class="text-red-600 text-sm text-center">
                    {{ form.errors.cf_turnstile_response }}
                </div>
                <div class=" hidden text-center">
                    <a href="#" class="text-sm text-indigo-600 hover:text-indigo-500" @click.prevent="reloadTurnstile">
                        Reload CAPTCHA
                    </a>
                </div>

          <!-- Remember Me & Forgot Password -->
          <div class="flex items-center justify-between">
            <label for="remember" class="flex items-center cursor-pointer select-none py-1">
              <input
                id="remember"
                name="remember"
                type="checkbox"
                class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded cursor-pointer transition-colors"
                v-model="form.remember"
              />
              <span class="ml-2 text-sm text-gray-700 font-medium">Remember me</span>
            </label>
            <a href="#" class="text-sm text-primary hover:text-primary-dark">Forgot password?</a>
          </div>

          <!-- Submit Button -->
          <button class="btn-primary font-semibold w-full transition-transform transform hover:scale-[1.02]" :disabled="form.processing">Sign in</button>

        </form>
      </div>
    </div>

    <div class="relative">
        <div class="absolute inset-0 flex items-center px-10">
            <div class="w-full border-t-2 border-gray-300 "></div>
        </div>
    </div>
  </template>


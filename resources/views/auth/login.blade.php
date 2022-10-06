<x-guest-layout>
		<x-auth-card>
				<x-slot name="logo">
						<a class="text-3xl font-black uppercase text-gray-50" href="/">
								{{-- <x-application-logo class="h-20 w-20 fill-current text-gray-500" /> --}}
								Tchoupi<span class="text-red-600">Blog</span>
						</a>
				</x-slot>

				<!-- Session Status -->
				<x-auth-session-status :status="session('status')" class="mb-4" />

				<form action="{{ route('login') }}" method="POST">
						@csrf

						<!-- Email Address -->
						<div>
								<x-input-label :value="__('Email')" for="email" />

								<x-text-input :value="old('email')" autofocus class="mt-1 block w-full" id="email" name="email" required
										type="email" />

								<x-input-error :messages="$errors->get('email')" class="mt-2" />
						</div>

						<!-- Password -->
						<div class="mt-4">
								<x-input-label :value="__('Mot de passe')" for="password" />

								<x-text-input autocomplete="current-password" class="mt-1 block w-full" id="password" name="password" required
										type="password" />

								<x-input-error :messages="$errors->get('password')" class="mt-2" />
						</div>

						<!-- Remember Me -->
						<div class="mt-4 block">
								<label class="inline-flex items-center" for="remember_me">
										<input
												class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
												id="remember_me" name="remember" type="checkbox">
										<span class="ml-2 text-sm text-gray-600">{{ __('Se souvenir de moi') }}</span>
								</label>
						</div>

						<div class="mt-4 flex items-center justify-end">
								@if (Route::has('password.request'))
										<a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('password.request') }}">
												{{ __('Mot de passe oublié?') }}
										</a>
								@endif

								<x-primary-button class="ml-3">
										{{ __('Connexion') }}
								</x-primary-button>
						</div>
				</form>
		</x-auth-card>
</x-guest-layout>

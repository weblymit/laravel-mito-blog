<x-guest-layout>
		<x-auth-card>
				<x-slot name="logo">
						<a class="text-3xl font-black uppercase text-gray-50" href="/">
								{{-- <x-application-logo class="h-20 w-20 fill-current text-gray-500" /> --}}
								Tchoupi<span class="text-red-600">Blog</span>
						</a>
				</x-slot>

				<div class="mb-4 text-sm text-gray-600">
						{{ __("Mot de passe oublié? Aucun problème. Indiquez-nous simplement votre adresse e-mail et nous vous enverrons par e-mail un lien de réinitialisation de mot de passe qui vous permettra d'en choisir un nouveau.") }}
				</div>

				<!-- Session Status -->
				<x-auth-session-status :status="session('status')" class="mb-4" />

				<form action="{{ route('password.email') }}" method="POST">
						@csrf

						<!-- Email Address -->
						<div>
								<x-input-label :value="__('Email')" for="email" />

								<x-text-input :value="old('email')" autofocus class="mt-1 block w-full" id="email" name="email" required
										type="email" />

								<x-input-error :messages="$errors->get('email')" class="mt-2" />
						</div>

						<div class="mt-4 flex items-center justify-end">
								<x-primary-button>
										{{ __('Lien de réinitialisation') }}
								</x-primary-button>
						</div>
				</form>
		</x-auth-card>
</x-guest-layout>

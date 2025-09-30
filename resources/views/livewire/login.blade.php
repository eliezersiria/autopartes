<div class="bg-gray-100 flex items-center justify-center min-h-screen">
    <x-card class="w-full max-w-md p-6 bg-white rounded-xl shadow-lg">
        <h2 class="text-2xl font-bold text-center mb-6">Iniciar Sesión</h2>

        <fieldset class="fieldset bg-base-200 border-base-300 rounded-box border p-4">
            <x-form wire:submit.prevent="login">
                <x-input label="Email" type="email" wire:model="email" id="email" placeholder="Escribe tu correo" />
                <x-input label="Contraseña" type="password" wire:model="password" placeholder="Escribe tu contraseña" />

                <x-slot:actions>
                    <x-button label="Cancel" />
                    <x-button label="Ingresar" class="btn-primary" type="submit" spinner="login" />
                </x-slot:actions>
            </x-form>
        </fieldset>
        @if (session()->has('message'))
            <x-alert icon="o-check" class="alert alert-success alert-outline">
                <span>{{ session('message') }}</span>
            </x-alert>
        @endif
    </x-card>
</div>
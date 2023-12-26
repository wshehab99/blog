<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-grey-300 p-6 rounded-xl" >
            <h1 class="text-center font-bold text-xl">Login!</h1>
            <form
                method="POST"
                action="/login"
                class="mt-10"
            >
                @csrf
                {{--email--}}
                <x-form.label-input-error name="email" type="text"></x-form.label-input-error>
                {{--password--}}
                <x-form.label-input-error name="password" type="password"></x-form.label-input-error>
                <x-form.field class="mb-6">
                    <x-form.button>Login</x-form.button>
                </x-form.field>
            </form>
        </main>
    </section>
</x-layout>

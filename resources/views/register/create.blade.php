<x-layout>
    <section class="px-6 py-8">
       <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-grey-300 p-6 rounded-xl" >
           <h1 class="text-center font-bold text-xl">Register!</h1>
           <form
               method="POST"
               action="/register"
               class="mt-10"
           >
               @csrf
               {{--name--}}
               <div class="mb-6">
                   <label class="block mb-2 uppercase font-bold text-xs text-grey-700"
                          for="name"
                   >
                       name
                   </label>
                   <input
                       class="border border-grey-400 p-2 w-full"
                       type="text"
                       name="name"
                       id="name"
                       value="{{old('name')}}"
                       required
                   >
                   @error('name')
                   <p class="text-red-500 text-xs mt-1">{{$message}} </p>
                   @enderror
               </div>

                {{--username--}}
               <div class="mb-6">
                   <label class="block mb-2 uppercase font-bold text-xs text-grey-700"
                   for="username"
                   >
                    username
                   </label>
                   <input
                   class="border border-grey-400 p-2 w-full"
                    type="text"
                    name="username"
                    id="username"
                   value="{{old('username')}}"
                   required
                   >
                   @error('username')
                   <p class="text-red-500 text-xs mt-1">{{$message}} </p>
                   @enderror
               </div>
               {{--email--}}
               <div class="mb-6">
                   <label class="block mb-2 uppercase font-bold text-xs text-grey-700"
                          for="email"
                   >
                       email
                   </label>
                   <input
                       class="border border-grey-400 p-2 w-full"
                       type="email"
                       name="email"
                       id="email"
                       value="{{old('email')}}"
                       required
                   >
                   @error('email')
                   <p class="text-red-500 text-xs mt-1">{{$message}} </p>
                   @enderror
               </div>
               {{--password--}}
               <div class="mb-6">
                   <label class="block mb-2 uppercase font-bold text-xs text-grey-700"
                          for="password"
                   >
                       password
                   </label>
                   <input
                       class="border border-grey-400 p-2 w-full"
                       type="password"
                       name="password"
                       id="password"
                       required
                   >
                   @error('password')
                   <p class="text-red-500 text-xs mt-1">{{$message}} </p>
                   @enderror
               </div>
               <div class="mb-6">
                   <x-form.button>Submit</x-form.button>
               </div>
           </form>
       </main>
    </section>
</x-layout>

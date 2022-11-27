@extends('master-layout')
@section('content')
    <section class="h-screen">
        <div class="px-6 h-full text-gray-800">
            <div class="flex xl:justify-center lg:justify-between justify-center items-center flex-wrap h-full g-6">
                <div class="xl:ml-20 xl:w-5/12 lg:w-5/12 md:w-8/12 mb-12 md:mb-0">
                    @error('name')
                    <div class="bg-red-100 rounded-lg py-5 px-6 mb-4 text-base text-red-700 mb-3" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                    @error('email')
                    <div class="bg-red-100 rounded-lg py-5 px-6 mb-4 text-base text-red-700 mb-3" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                    @error('password')
                    <div class="bg-red-100 rounded-lg py-5 px-6 mb-4 text-base text-red-700 mb-3" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                    @error('package')
                    <div class="bg-red-100 rounded-lg py-5 px-6 mb-4 text-base text-red-700 mb-3" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <!-- Name input -->
                        <div class="mb-6">
                            <input type="text" name="name" value="{{ old('name') }}"
                                class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="exampleFormControlInput2" placeholder="Full Name" />
                        </div>

                        <!-- Email input -->
                        <div class="mb-6">
                            <input type="email" name="email" value="{{ old('email') }}"
                                class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="exampleFormControlInput2" placeholder="Email address" />
                        </div>

                        <!-- Password input -->
                        <div class="mb-6">
                            <input type="password" name="password"
                                class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="exampleFormControlInput2" placeholder="Password" />
                        </div>

                        <!-- Confirmation Password input -->
                        <div class="mb-6">
                            <input type="password" name="confirmation-password"
                                class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="exampleFormControlInput3" placeholder="Confirmation Password" />
                        </div>

                        <!-- Package input -->
                        <div class="mb-6">
                            <select name="package" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                                <option selected>Choose Package</option>
                                @foreach ($packages as $package)
                                <option value="{{ $package->prefix }}">{{ $package->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="text-center lg:text-left">
                            <button type="submit"
                                class="inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                Register
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

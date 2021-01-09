<footer class="px-6 lg:px-8 py-12">
    <div class="max-w-screen-xl mx-auto ">
        <div class="grid grid-cols-8 md:grid-cols-9  lg:grid-cols-8  divide-gray-200 divide-y-2 md:divide-x-2 md:divide-y-0 md:-mx-8">
            <div class="col-span-8 md:col-span-3 lg:col-span-2 md:px-8 py-4 md:py-0">
                <h5 class="text-xl font-semibold text-gray-700">De Heksentuin</h5>
                <nav class="mt-4">
                    <ul class="space-y-2">
                        <li>
                            <a href="{{route("index")}}" class="font-normal text-base hover:text-beige-300">Home</a>
                        </li>
                        <li>
                            <a href="{{route("policy.show")}}" class="font-normal text-base hover:text-beige-300">{{__("Privacy Policy")}}</a>
                        </li>
                        <li>
                            <a href="{{route("terms.show")}}" class="font-normal text-base hover:text-beige-300">{{__("Terms of Service")}}</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-span-8 md:col-span-3 lg:col-span-3 md:px-8 py-4 md:py-0">
                <h5 class="text-xl font-semibold text-gray-700">{{__u("menu.links.quick")}}</h5>
                <nav class="mt-4">
                    <ul class="grid lg:grid-cols-2">
                        <li class="mb-2">
                            <a href="{{route("product.index")}}" class="font-normal text-base hover:text-beige-300">{{__u("menu.products.all")}}</a>
                        </li>
                        <li class="mb-2">
                            <a href="{{route("product.index")}}" class="font-normal text-base hover:text-beige-300">{{__u("menu.products.top")}}</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-span-8 md:col-span-3 lg:col-span-3 md:px-8 py-4 md:py-0">
                <h5 class="text-xl font-semibold text-gray-700">{{__u("menu.links.follow")}}</h5>
                <nav class="mt-4">
                    <ul class="grid lg:grid-cols-2">
                        <li class="mb-2">
                            <a href="https://www.instagram.com/de_heksentuin/" class="flex space-x-2  font-normal text-base hover:text-beige-300">
                                <span><i class="fab fa-instagram"></i></span><span>Instagram</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="https://www.facebook.com/heksentuin" class="flex space-x-2  font-normal text-base hover:text-beige-300">
                                <span><i class="fab fa-facebook-square"></i></span><span>Facebook</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="https://mrtrainings.be/" class="flex space-x-2  font-normal text-base hover:text-beige-300">
                                <span><i class="fa fa-horse-head"></i></span><span>MR Trainings</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="max-w-screen-xl mx-auto flex flex-col md:flex-row justify-between items-center space-y-4 mt-8 lg:mt-12 border-t-2 border-gray-200 pt-8">
        <p class="text-sm text-center md:text-right">&copy; {{\Carbon\Carbon::now()->format("Y")}} {{config("app.name")}}. All rights reserved.</p>
    </div>
</footer>


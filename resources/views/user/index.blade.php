<x-page-layout>

    @if (count($blogs) > 0)
        <div class="container mx-auto pt-4 pb-8 w-11/12 sm:w-4/5">
            <h1 class="font-bold text-5xl sm:text-6xl mb-8">The Blog</h1>
            <div>
                {{-- Latest One Blog --}}
                <div class="grid lg:grid-cols-2 gap-8 mb-12">
                    <div class="h-[400px]">
                        <img src="{{ asset('assets/images/blogs/' . $blogs[0]->image_name) }}" alt=""
                            class="rounded-md w-full h-full object-cover" />
                    </div>
                    <div class="flex flex-col gap-4">
                        <p class="font-semibold text-[var(--secondary)]">{{ $blogs[0]->created_at->diffForHumans() }}
                        </p>
                        <h2 class="font-semibold text-4xl sm:text-5xl">
                            {{ $blogs[0]->title }}
                        </h2>
                        <p class="font-semibold text-[var(--secondary)] line-clamp-3">
                            {{ $blogs[0]->description }}
                        </p>
                        <a href="{{ route('user.show-blog', $blogs[0]->id) }}"
                            class="text-center bg-[var(--tertiary)] sm:w-1/3 rounded-md py-1 text-white border border-[var(--tertiary)] transition-all hover:bg-transparent hover:text-[var(--tertiary)]">Show
                            Detail</a>
                    </div>
                </div>

                {{-- Blogs --}}
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-12">
                    @foreach ($blogs as $blog)
                        <div class="flex flex-col gap-2 h-full">
                            <div class="h-[260px]">
                                <img src="{{ asset('assets/images/blogs/' . $blog->image_name) }}" alt=""
                                    class="rounded-md w-full h-full object-cover" />
                            </div>
                            <p class="font-semibold text-[var(--secondary)]">{{ $blog->created_at->diffForHumans() }}
                            </p>
                            <h2 class="font-semibold text-2xl">
                                {{ $blog->title }}
                            </h2>
                            <p class="font-semibold text-[var(--secondary)] line-clamp-3">
                                {{ $blog->description }}
                            </p>
                            <a href="{{ route('user.show-blog', $blog->id) }}"
                                class="text-center bg-[var(--tertiary)] sm:w-1/2 rounded-md py-1 text-white border border-[var(--tertiary)] transition-all hover:bg-transparent hover:text-[var(--tertiary)]">Show
                                Detail</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <div class="h-screen flex justify-center items-center">
            <h1 class="font-bold text-5xl sm:text-6xl">No Blog Yet</h1>
        </div>
    @endif
</x-page-layout>

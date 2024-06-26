@inject('PaginateGlobal', 'App\Traits\PaginateGlobal')

@extends('frontend.layouts.app')

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset(mix('assets/css/app.css')) }}">
@endsection

@section('vendor-script')
    <script src="{{ asset(mix('assets/js/app.js')) }}"></script>
@endsection

@section('content')
    <section class="py-12 mb-72 px-2">
        <div class="max-w-5xl mx-auto w-full bg-white h-full border rounded-lg shadow-md p-4 lg:p-6">
            <div class="lg:flex space-x-0 lg:space-x-8">
                <div class="flex-none max-w-xl w-full">
                    <figure class="w-full relative aspect-video overflow-hidden rounded-md">
                        <img class="absolute object-cover w-full h-full"
                            src="{{ asset('storage/komoditas/' . $komoditas->photo) }}" />
                    </figure>
                </div>
                <article class="grow w-auto">
                    <div class="font-bold text-2xl pt-2">
                        {{ $komoditas->nama_komoditas }}
                    </div>
                    <fieldset class="mb-3 flex space-x-1 text-xs pt-2">
                        <i class="las la-map-marker"></i>
                        <span class="grow">
                            {{ $komoditas->alamat }}
                        </span>
                    </fieldset>
                    <div class="lg:grid grid-cols-2 gap-x-2">
                        <fieldset class="mb-3">
                            <label class="text-xs uppercase tracking-[1px] text-slate-500">Jenis Komoditas</label>
                            <div class="text-sm font-medium">
                                {{ $komoditas->jenis_komoditas }}
                            </div>
                        </fieldset>
                        <fieldset class="mb-3">
                            @role('admin')
                                <label class="text-xs uppercase tracking-[1px] text-slate-500">Pemilik Komoditas</label>
                                <div class="text-sm font-medium">
                                    {{ $komoditas->user_id }}
                                </div>
                            @endrole

                        </fieldset>

                        <fieldset class="mb-3">
                            <label class="text-xs uppercase tracking-[1px] text-slate-500">Kategori</label>
                            <div class="text-sm font-medium">
                                {{ $komoditas->kategori_komoditas }}
                            </div>
                        </fieldset>
                    </div>
                    <div class="lg:grid grid-cols-2 gap-x-2">
                        <div class="mb-3">
                            <label class="text-xs uppercase tracking-[1px] text-slate-500 flex items-center">
                                <span class="text-lg mr-1">
                                    <i class="las la-cubes"></i>
                                </span>
                                Kuantitas
                            </label>
                            <div class="text-sm font-medium">
                                {{ $komoditas->produksi_kuantitas }}
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="text-xs uppercase tracking-[1px] text-slate-500 flex items-center">
                                <span class="text-lg mr-1">
                                    <i class="las la-calendar"></i>
                                </span>
                                Waktu
                            </label>
                            <div class="text-sm font-medium">
                                {{ $komoditas->produksi_waktu }}
                            </div>
                        </div>
                    </div>
                    <div class="text-sm meta-postdescription mb-8 pt-3">
                        <p>
                            {{ $komoditas->deskripsi }}
                        </p>
                        <br />
                    </div>
                    <div class="mb-5">
                        <a href="https://wa.me/6281214911911?text=Saya tertarik dengan komoditas ini. {{ URL::current() }}"
                            class="font-medium border-[1px] bg-green-800 border-green-800 text-white px-4 py-2.5 rounded-full hover:bg-green-900"
                            target="_blank">
                            Hubungi Sekarang
                        </a>
                    </div>
                </article>
            </div>
        </div>
    </section>
@endsection

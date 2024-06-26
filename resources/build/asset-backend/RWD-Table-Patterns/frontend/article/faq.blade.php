@inject('PaginateGlobal', 'App\Traits\PaginateGlobal')
@extends('frontend.layouts.app')

@section('content')
    <section class="w-100 clearfix faqSec" id="faqSec">
        <div class="container">
            <div class="faqContent">
                <div class="commonHeading">
                    <h4>Frequently Asked Quetions</h4>
                </div>
                <div class="faqTab">
                    <div class="accordion" id="accordionExample">
                        @foreach ($dataFaq as $item)
                            @php
                                $accordion++;
                            @endphp
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $item->id }}">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $item->id }}"
                                        aria-expanded="{{ $accordion == 1 ? true : false }}"
                                        aria-controls="collapse{{ $item->id }}">
                                        {{ $item->title }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $item->id }}"
                                    class="accordion-collapse collapse {{ $accordion == 1 ? 'show' : '' }}"
                                    aria-labelledby="heading{{ $item->id }}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {!! $item->description !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

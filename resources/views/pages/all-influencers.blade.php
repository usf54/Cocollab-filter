@extends('layouts.app')

@section('content')

<!-- breadcrumb area -->
<div class="rts__section breadcrumb__background">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 position-relative d-flex justify-content-between align-items-center">
                <div class="breadcrumb__area max-content breadcrumb__padding z-2">
                    <h1 class="breadcrumb-title h3 mb-3 text-white">Influenceurs</h1>
                    <nav>
                        <ul class="breadcrumb m-0 lh-1">
                            <li class="breadcrumb-item"><a style="color: white !important;" href="index.html">Acceuil</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Influenceurs</li>
                        </ul>
                    </nav>
                </div>
                <div class="breadcrumb__area__shape d-flex gap-4 justify-content-end align-items-center">
                    <div class="shape__one common">
                        <img src="assets/img/breadcrumb/shape-1.svg" alt="">
                    </div>
                    <div class="shape__two common">
                        <img src="assets/img/breadcrumb/shape-2.svg" alt="">
                    </div>
                    <div class="shape__three common">
                        <img src="assets/img/breadcrumb/shape-3.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area end -->

<!-- influencer list one -->
<div class="rts__section section__padding">
    <div class="container">
        <div class="row g-30">
            <div class="col-lg-5 col-xl-4">
                <div class="job__search__section mb-40">
                <form action="{{ route('allinfluencers') }}" method="GET" class="d-flex flex-column row-30">
                        <!-- Search by Name -->
                        <div class="search__item">
                            <label for="search" class="mb-20 font-20 fw-medium text-dark text-capitalize">Rechercher par nom</label>
                            <div class="position-relative">
                                <input type="text" id="search" name="search" placeholder="Entrez le nom de l'influenceur(Euse)" value="{{ request('search') }}" >
                            </div>
                        </div>

                        <!-- Filter by Domain -->
                        <div class="search__item">
                            <h6 class="mb-2 font-20 fw-medium text-dark text-capitalize">Rechercher par domaine</h6>
                            <div class="position-relative">
                                <select name="sector" id="sector" class="nice-select">
                                    <option value="">Domaine</option>
                                    @foreach($sectors as $sector)
                                        <option value="{{ $sector->id }}" {{ request('sector') == $sector->id ? 'selected' : '' }}>{{ $sector->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Filter by Gender -->
                        <div class="search__item">
                            <h6 class="mb-2 font-20 fw-medium text-dark text-capitalize">Sex</h6>
                            <div class="search__item__list">
                                <div class="d-flex align-items-center justify-content-between list">
                                    <div class="d-flex gap-2 align-items-center checkbox">
                                        <input type="checkbox" name="gender[]" value="Feminin" id="female" {{ in_array('Feminin', request('gender', [])) ? 'checked' : '' }}>
                                        <label for="female">Feminin</label>
                                    </div>
                                    <span>(80)</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between list">
                                    <div class="d-flex gap-2 align-items-center checkbox">
                                        <input type="checkbox" name="gender[]" value="Masculin" id="male" {{ in_array('Masculin', request('gender', [])) ? 'checked' : '' }}>
                                        <label for="male">Masculin</label>
                                    </div>
                                    <span>(150)</span>
                                </div>
                            </div>
                        </div>

                        <!-- Filter by Followers -->
                        <div class="search__item">
                            <h6 class="mb-2 font-20 fw-medium text-dark text-capitalize">Nombre d'abonnés</h6>
                            <div class="search__item__list">
                                @php
                                    $follower_ranges = [
                                        '50000' => '0 - 50K',
                                        '100000' => '50K - 100K',
                                        '500000' => '100K - 500K',
                                        '1000000' => '500K - 1M',
                                        '1000001' => '1M+'
                                    ];
                                @endphp
                                @foreach($follower_ranges as $value => $label)
                                    <div class="d-flex align-items-center justify-content-between list">
                                        <div class="d-flex gap-2 align-items-center checkbox">
                                            <input type="checkbox" name="nbr_abonnes[]" value="{{ $value }}" id="{{ $value }}" {{ in_array($value, request('nbr_abonnes', [])) ? 'checked' : '' }}>
                                            <label for="{{ $value }}">{{ $label }}</label>
                                        </div>
                                        <span>(10)</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>


                        <button type="submit" class="rts__btn no__fill__btn max-content mx-auto job__search__btn font-sm" aria-label="Search">Trouver l'Influenceur(Euse)</button>
                    </form>

                </div>
            </div>




            <div class="col-lg-7 col-xl-8">
                <div class="top__query mb-40 d-flex flex-wrap gap-4 gap-xl-0 justify-content-between align-items-center">
                    <span class="text-dark font-20 fw-medium">Affichage de 8 marques par page</span>
                    <div class="d-flex flex-wrap align-items-center gap-4">
                        <div class="d-flex align-items-center gap-3" id="nav-tab" role="tablist">
                            <button class="rts__btn no__fill__btn grid-style nav-link active" data-bs-toggle="tab" data-bs-target="#grid">Grid</button>
                            <button class="rts__btn no__fill__btn list-style nav-link" data-bs-toggle="tab" data-bs-target="#list">List</button>
                        </div>
                    </div>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" role="tabpanel" id="grid">
                        <div class="row g-30">
                            <!-- single candidate -->
                            @foreach($influencers as $influencer)
                                <div class="col-xl-6 col-md-6 col-lg-12">
                                    <div class="rts__author__card style__default d-flex flex-column gap-3">
                                        <div class="author_icon">
                                            <img src="{{ asset('storage/'.$influencer->image) }}" class="rounded-5" alt="{{ $influencer->name }}">
                                        </div>
                                        <div class="job__meta w-100 d-flex flex-column gap-3">
                                            <div class="d-flex flex-column align-items-center gap-1">
                                                <a href="{{ route('influencerprofile', ['id' => $influencer->id]) }}" class="job__title h6 mb-0">
                                                    {{ $influencer->influencerName }}
                                                </a>
                                                <span class="author">{{ $influencer->influencerDescription }}</span>
                                            </div>
                                            <div class="d-flex justify-content-center gap-3 flex-wrap">
                                                <div class="d-flex gap-2 align-items-center">
                                                    {{ $influencer->influencerAge }}
                                                </div>
                                                <div class="d-flex gap-2 align-items-center">
                                                    {{ $influencer->sexe }}
                                                </div>
                                            </div>
                                            <div class="job__tags d-flex justify-content-center mb-3 flex-wrap gap-3">
                                                @foreach($influencer->influencerPlatforms as $platform)
                                                    <a href="#">{{ $platform }}</a>
                                                @endforeach
                                            </div>
                                            <a href="{{ route('influencerprofile', ['id' => $influencer->id]) }}" class="apply__btn max-content">
                                                View Profile
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" role="tabpanel" id="list">
                        <div class="row g-30">
                            <!-- author card -->
                            @foreach($influencers as $influencer)
                                <div class="col-12">
                                    <div class="rts__author__card__big style__gradient__two flex-wrap d-flex justify-content-between align-items-center gap-3">
                                        <div class="d-flex gap-3 gap-md-4 flex-column flex-md-row justify-content-start align-items-start align-items-md-center">
                                            <div class="author__icon">
                                                <img src="{{ asset('storage/'.$influencer->image) }}" alt="{{ $influencer->influencerName }}" class="rounded-5">
                                            </div>
                                            <div class="job__meta">
                                                <div class="d-flex align-items-start flex-column">
                                                    <a href="{{ route('influencerprofile', ['id' => $influencer->id]) }}" class="job__title mb-0 h6 fw-semibold">
                                                        {{ $influencer->influencerName }}
                                                    </a>
                                                    <span class="d-block fw-medium">{{ $influencer->influencerDescription }}</span>
                                                </div>
                                                <div class="job__tags mt-3 d-flex flex-wrap gap-3">
                                                    @foreach($influencer->influencerPlatforms as $platform)
                                                        <a href="#">{{ $platform }}</a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex gap-4 flex-wrap align-items-center">
                                            <div class="d-flex gap-3 flex-wrap gap-lg-4 fw-medium">
                                                <div class="d-flex gap-2 align-items-center">
                                                    {{ $influencer->influencerAge }}
                                                </div>
                                                <div class="d-flex gap-2 align-items-center">
                                                    {{ $influencer->sexe }}
                                                </div>
                                            </div>
                                            <a href="{{ route('influencerprofile', ['id' => $influencer->id]) }}" class="apply__btn" aria-label="View Profile">
                                                View Profile
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>

                <div class="rts__pagination mx-auto pt-60 max-content">
                    <ul class="d-flex gap-2">
                        <li><a href="#" class="inactive"><i class="rt-chevron-left"></i></a></li>
                        <li><a class="active" href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#"><i class="rt-chevron-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- job list one end -->

<x-canva />

@endsection